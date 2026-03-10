<?php

namespace App\Filament\Resources\Moduls\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ModulForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->label('Nama Modul')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
