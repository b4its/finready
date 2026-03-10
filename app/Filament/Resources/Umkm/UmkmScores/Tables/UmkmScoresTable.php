<?php

namespace App\Filament\Resources\Umkm\UmkmScores\Tables;

use App\Models\Score;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UmkmScoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                Score::query()
                    ->selectRaw('score.*, ROW_NUMBER() OVER (ORDER BY created_at desc) as row_num')
                    ->where('idUser', Auth::user()->id)
                    ->orderBy('created_at', 'desc') // urutkan tampilannya dari terbaru
            )
            ->columns([
                //
                TextColumn::make('room.name')
                    ->label('Room Name')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('score')
                    ->label('Score')
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
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
