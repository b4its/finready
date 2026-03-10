<?php

namespace App\Filament\Resources\Umkm\UmkmProfiles\Pages;

use App\Filament\Resources\Umkm\UmkmProfiles\UmkmProfileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUmkmProfiles extends ListRecords
{
    protected static string $resource = UmkmProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
