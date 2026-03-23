<?php

namespace App\Filament\Pages\Umkm;

use App\Models\Profile;
use Filament\Pages\Page;
use BackedEnum;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class UmkmProfilePersonal extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user';
    protected string $view = 'filament.pages.umkm.umkm-profile-personal';
    protected static ?string $title = 'Profil Pemilik UMKM';
    public ?array $data = [];

    public function mount(): void
    {
        $profile = Profile::firstOrCreate(
            ['idUsers' => Auth::id()],
            [
                'nik' => Auth::user()->name ?? '',
                'jenisUsaha' => null,
                'nib' => null,
                'phone' => null,
                'alamat' => null,
            ]
        );

        $this->form->fill($profile->toArray());
    }

    // Perubahan krusial: Menyesuaikan parameter dengan arsitektur Filament 5.x (Schema)
    public function form(\Filament\Schemas\Schema $form): \Filament\Schemas\Schema
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('user.name')
                    ->label('Nama Pemilik UMKM')
                    ->required()
                    ->maxLength(255),
                
                \Filament\Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->maxLength(255),
                
                
                \Filament\Forms\Components\TextInput::make('nik')
                    ->label('NIK (Nomor Induk Kependudukan)')
                    ->numeric()
                    ->maxLength(16),
                
                \Filament\Forms\Components\TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                
                \Filament\Forms\Components\Textarea::make('alamat')
                    ->label('Alamat Lengkap')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Profile::updateOrCreate(
            ['idUsers' => Auth::id()],
            $data
        );

        Notification::make()
            ->success()
            ->title('Profil Berhasil Diperbarui')
            ->send();
    }
}
