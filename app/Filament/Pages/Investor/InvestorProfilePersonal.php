<?php

namespace App\Filament\Pages\Investor;

use Filament\Pages\Page;
use BackedEnum;

class InvestorProfilePersonal extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user';
    protected string $view = 'filament.pages.investor.investor-profile-personal';
    protected static ?string $title = 'Profile Personal Investor';
}
