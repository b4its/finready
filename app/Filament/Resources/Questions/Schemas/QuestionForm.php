<?php

namespace App\Filament\Resources\Questions\Schemas;

use App\Models\Room;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
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

                TextInput::make('question')
                    ->label('Pertanyaan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('optionA')
                    ->label('Option A')
                    ->required(),
                TextInput::make('optionB')
                    ->label('Option B')
                    ->required(),
                TextInput::make('optionC')
                    ->label('Option C')
                    ->required(),
                TextInput::make('optionD')
                    ->label('Option D')
                    ->required(),
                TextInput::make('key_answer')
                    ->label('Kunci Jawaban')
                    ->required()
                    ->maxLength(1)
                    ->helperText('Masukkan huruf A, B, C, atau D sebagai kunci jawaban.'),
                
            ]);
    }
}
