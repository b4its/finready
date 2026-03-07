<?php

namespace App\Filament\Resources\ModuleContents\Pages;

use App\Filament\Resources\ModuleContents\ModuleContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListModuleContents extends ListRecords
{
    protected static string $resource = ModuleContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
