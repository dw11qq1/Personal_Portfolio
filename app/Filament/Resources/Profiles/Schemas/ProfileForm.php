<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->required(),
                TextInput::make('years_experience')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('projects_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('clients_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('awards_count')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
