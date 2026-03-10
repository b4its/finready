<?php

namespace App\Filament\Resources\Moduls\Pages;

use App\Filament\Resources\Moduls\ModulResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListModuls extends ListRecords
{
    protected static string $resource = ModulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
