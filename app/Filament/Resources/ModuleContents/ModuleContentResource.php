<?php

namespace App\Filament\Resources\ModuleContents;

use App\Filament\Resources\ModuleContents\Pages\CreateModuleContent;
use App\Filament\Resources\ModuleContents\Pages\EditModuleContent;
use App\Filament\Resources\ModuleContents\Pages\ListModuleContents;
use App\Filament\Resources\ModuleContents\Schemas\ModuleContentForm;
use App\Filament\Resources\ModuleContents\Tables\ModuleContentsTable;
use App\Models\ModuleContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ModuleContentResource extends Resource
{
    protected static ?string $model = ModuleContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'module_content';

    public static function form(Schema $schema): Schema
    {
        return ModuleContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModuleContentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListModuleContents::route('/'),
            'create' => CreateModuleContent::route('/create'),
            'edit' => EditModuleContent::route('/{record}/edit'),
        ];
    }
}
