<?php

namespace App\Filament\Pages\Investor;

use Filament\Pages\Page;
use BackedEnum;
class InvestorProfile extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-identification';
    protected string $view = 'filament.pages.investor.investor-profile';
    protected static ?string $title = 'Profil Investor';
}
