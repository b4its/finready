<?php

namespace App\Filament\Resources\Umkm\UmkmProfiles\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UmkmProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->label('Nama UMKM')
                    ->required(),

                Select::make('jenisUsaha')
                    ->label('Jenis Usaha')
                    ->options([
                        'dagang' => 'Usaha Dagang',
                        'jasa' => 'Usaha Jasa',
                    ])
                    ->required(),

                TextInput::make('nib')
                    ->label('Nomor Induk Berusaha'),

                TextInput::make('email')
                    ->label('Email')
                    ->email(),

                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel(),

                TextInput::make('alamat')
                    ->label('Alamat'),

                
                
            ]);
    }
}
