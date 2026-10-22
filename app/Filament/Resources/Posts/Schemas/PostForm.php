<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->afterStateUpdated(function (string $operation, $state, $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state) ?: Str::random(8));
                        }
                    })
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('URL 路径，标题填写后自动生成，可手动修改')
                    ->columnSpanFull(),
                Textarea::make('excerpt')
                    ->maxLength(500)
                    ->rows(2)
                    ->columnSpanFull()
                    ->helperText('摘要，显示在列表页；留空则截取正文前 120 字'),
                RichEditor::make('content')
                    ->required()
                    ->fileAttachmentsDirectory('post-attachments')
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->image()
                    ->imageEditor()
                    ->directory('post-covers')
                    ->maxSize(2048)
                    ->columnSpanFull(),
                DatePicker::make('published_at')
                    ->default(now())
                    ->helperText('留空 = 草稿，不显示在前台；设置当前或过去时间 = 发布'),
            ]);
    }
}
