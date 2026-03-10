<?php

namespace App\Filament\Resources\Moduls;

use App\Filament\Resources\Moduls\Pages\CreateModul;
use App\Filament\Resources\Moduls\Pages\EditModul;
use App\Filament\Resources\Moduls\Pages\ListModuls;
use App\Filament\Resources\Moduls\Schemas\ModulForm;
use App\Filament\Resources\Moduls\Tables\ModulsTable;
use App\Models\Modul;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ModulResource extends Resource
{
    protected static ?string $model = Modul::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'modul';

    public static function form(Schema $schema): Schema
    {
        return ModulForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModulsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Modul';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-tag';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListModuls::route('/'),
            // 'create' => CreateModul::route('/create'),
            // 'edit' => EditModul::route('/{record}/edit'),
        ];
    }
}
