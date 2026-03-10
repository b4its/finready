<?php

namespace App\Filament\Pages\Umkm;
use BackedEnum;
use Filament\Pages\Page;

class UmkmProfile extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-shopping-cart';
    protected string $view = 'filament.pages.umkm.umkm-profile';
    protected static ?string $title = 'Profil UMKM';
}
