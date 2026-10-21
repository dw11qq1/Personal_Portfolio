<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('percent')
                    ->required()
                    ->numeric(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
