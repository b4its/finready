<?php

namespace App\Filament\Resources\ModuleContents\Schemas;

use App\Models\Modul;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
// Import namespace yang benar sesuai error log Anda
use Filament\Schemas\Components\Utilities\Get; 

class ModuleContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('idModule')
                    ->label('Module')
                    ->options(Modul::all()->pluck('name', 'id'))
                    ->searchable(),

                TextInput::make('title')
                    ->label('Title')
                    ->required(),

                Select::make('type')
                    ->label('Tipe Konten')
                    ->options([
                        'text' => 'Text',
                        'video' => 'Video',
                        'kuis' => 'Kuis',
                    ])
                    ->required()
                    ->live(), 

                TextInput::make('url')
                    ->label('Link Video')
                    ->placeholder('Masukkan link video YouTube')
                    // Hapus type-hint 'Closure' dan gunakan 'Get' atau biarkan kosong agar fleksibel
                    ->visible(fn (Get $get) => $get('type') === 'video')
                    ->required(fn (Get $get) => $get('type') === 'video')
                    ->url(),

                RichEditor::make('content')
                    ->label('Content')
                    ->columnSpanFull(),
            ]);
    }
}