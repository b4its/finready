<?php

namespace App\Filament\Resources\Umkm\UmkmProfiles\Tables;

use App\Models\UmkmProfile;
use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UmkmProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                UmkmProfile::query()
                    ->selectRaw('umkm_profile.*, ROW_NUMBER() OVER (ORDER BY created_at desc) as row_num')
                    ->where('idUser', Auth::user()->id)
                    ->orderBy('created_at', 'desc') // urutkan tampilannya dari terbaru
            )
            ->columns([
                //
                TextColumn::make('row_num')
                    ->label('No')
                    ->sortable(),
                    
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nama UMKM')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('jenisUsaha')
                    ->label('Jenis Usaha')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('nib')
                    ->label('Nomor Induk Berusaha')
                    ->sortable()
                    ->searchable(),


                
                        
                    
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->button()
                    ->color('danger') // default abu-abu (tidak merah)
                    ->requiresConfirmation() // pastikan tampil popup konfirmasi
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalDescription('apakah yakin ingin menghapus data ini?')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->paginated(5)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
