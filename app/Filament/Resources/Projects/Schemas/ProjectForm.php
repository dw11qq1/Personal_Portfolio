<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('cover_image')
                    ->image()
                    ->imageEditor()
                    ->directory('covers')
                    ->maxSize(2048)
                    ->helperText('项目封面图，前台精选卡片展示（建议 16:9，小于 2MB）'),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('tags')
                    ->helperText('输入技术栈后回车添加，如：Laravel、MySQL')
                    ->columnSpanFull(),
                TextInput::make('live_url')
                    ->url()
                    ->helperText('在线演示地址（选填）'),
                TextInput::make('repo_url')
                    ->url()
                    ->helperText('源码仓库地址（选填）'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
