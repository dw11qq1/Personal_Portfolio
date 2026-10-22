<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('封面'),
                TextColumn::make('title')
                    ->searchable()
                    ->description(fn ($record) => $record->slug),
                TextColumn::make('published_at')
                    ->label('状态')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? '已发布' : '草稿')
                    ->color(fn ($state) => $state ? 'success' : 'warning')
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('发布时间')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
