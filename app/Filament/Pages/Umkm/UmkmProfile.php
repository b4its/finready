<?php

namespace App\Filament\Pages\Umkm;

use App\Models\UmkmProfile as UmkmProfileModel;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class UmkmProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected string $view = 'filament.pages.umkm.umkm-profile';
    
    protected static ?string $title = 'Profil UMKM';

    public ?array $data = [];

    public function mount(): void
    {
        $profile = UmkmProfileModel::with('sosialMedia')->firstOrCreate(
            ['idUsers' => Auth::id()],
            [
                'name' => Auth::user()->name ?? '',
                'jenisUsaha' => null,
                'nib' => null,
                'phone' => null,
                'alamat' => null,
            ]
        );

        $profileData = $profile->toArray();
        // Override key menjadi camelCase agar persis sama dengan nama Repeater
        $profileData['sosialMedia'] = $profile->sosialMedia->toArray();

        $this->form->fill($profileData);
    }

    public function form(\Filament\Schemas\Schema $form): \Filament\Schemas\Schema
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nama UMKM')
                    ->required()
                    ->maxLength(255),
                
                Select::make('jenisUsaha')
                    ->label('Jenis Usaha')
                    ->options([
                        'dagang' => 'Usaha Dagang',
                        'jasa' => 'Usaha Jasa',
                    ])
                    ->required(),
                
                \Filament\Forms\Components\TextInput::make('nib')
                    ->label('NIB (Nomor Induk Berusaha)')
                    ->numeric()
                    ->maxLength(255),
                
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

                Repeater::make('sosialMedia')
                    ->label('Sosial Media')
                    // relationship() dihapus di sini karena kita handle state manual
                    ->schema([
                        Select::make('name')
                            ->label('Nama Platform (Contoh: Instagram, Facebook)')
                            ->required()
                            ->options([
                                'instagram' => 'Instagram',
                                'facebook' => 'Facebook',
                                'tiktok' => 'Tiktok',
                                'twitter' => 'Twitter',
                            ]),
                        \Filament\Forms\Components\TextInput::make('link')
                            ->label('Link / URL')
                            ->url()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->addActionLabel('Tambah Sosial Media'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $sosialMediaData = $data['sosialMedia'] ?? [];
        unset($data['sosialMedia']);

        $profile = UmkmProfileModel::updateOrCreate(
            ['idUsers' => Auth::id()],
            $data
        );

        $profile->sosialMedia()->delete();
        
        if (!empty($sosialMediaData)) {
            $profile->sosialMedia()->createMany($sosialMediaData);
        }

        Notification::make()
            ->success()
            ->title('Profil Berhasil Diperbarui')
            ->send();
    }
}