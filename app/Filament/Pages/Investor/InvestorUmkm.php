<?php

namespace App\Filament\Pages\Investor;

use Filament\Pages\Page;
use BackedEnum;
class InvestorUmkm extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-building-storefront';
    protected string $view = 'filament.pages.investor.investor-umkm';
    protected static ?string $title = 'Cari UMKM';
}
