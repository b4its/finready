<?php

namespace App\Filament\Resources\Rooms\Schemas;

use App\Models\Room;
use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //

                Select::make('idRoom')
                    ->label('Room')
                    ->options(Room::all()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('name')
                    ->label('Nama Room')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
