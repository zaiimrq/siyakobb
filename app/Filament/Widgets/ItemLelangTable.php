<?php

namespace App\Filament\Widgets;

use App\Enums\ExecutionStatus;
use App\Models\Item;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ItemLelangTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Item::query()
                    ->where('eksekusi', ExecutionStatus::Dilelang)
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('tersangka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tindak_pidana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Golongan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kondisi_awal')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_tingkat_pemeriksaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jaksa_penitip')
                    ->searchable(),
            ])->actions([
                Action::make('reverse')
                    ->label('Batalkan Lelang')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->action(fn (Item $record) => $record->update(['eksekusi' => null])),
            ]);
    }
}
