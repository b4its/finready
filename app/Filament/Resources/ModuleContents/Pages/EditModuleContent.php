<?php

namespace App\Filament\Resources\ModuleContents\Pages;

use App\Filament\Resources\ModuleContents\ModuleContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditModuleContent extends EditRecord
{
    protected static string $resource = ModuleContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
