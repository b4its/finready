<?php

namespace App\Filament\Resources\Umkm\UmkmProfiles;

use App\Filament\Resources\Umkm\UmkmProfiles\Pages\CreateUmkmProfile;
use App\Filament\Resources\Umkm\UmkmProfiles\Pages\EditUmkmProfile;
use App\Filament\Resources\Umkm\UmkmProfiles\Pages\ListUmkmProfiles;
use App\Filament\Resources\Umkm\UmkmProfiles\Schemas\UmkmProfileForm;
use App\Filament\Resources\Umkm\UmkmProfiles\Tables\UmkmProfilesTable;
use App\Models\UmkmProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UmkmProfileResource extends Resource
{
    protected static ?string $model = UmkmProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'umkm_profile';

    public static function form(Schema $schema): Schema
    {
        return UmkmProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UmkmProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        // Hanya tampil jika ID panel adalah 'admin' (sesuaikan dengan ID panel Anda)
        return filament()->getCurrentPanel()->getId() === 'umkm';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUmkmProfiles::route('/'),
            // 'create' => CreateUmkmProfile::route('/create'),
            // 'edit' => EditUmkmProfile::route('/{record}/edit'),
        ];
    }
}
