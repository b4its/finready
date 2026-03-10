<?php

namespace App\Filament\Resources\Umkm\UmkmProfiles\Pages;

use App\Filament\Resources\Umkm\UmkmProfiles\UmkmProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUmkmProfile extends EditRecord
{
    protected static string $resource = UmkmProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
