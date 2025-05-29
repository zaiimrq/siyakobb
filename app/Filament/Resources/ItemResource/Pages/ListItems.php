<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Download')
                ->icon('heroicon-m-arrow-down-tray')
                ->color('success')
                ->modalWidth(MaxWidth::Large)
                ->form([
                    CheckboxList::make('fields')
                        ->label('Pilih Field')
                        ->bulkToggleable()
                        ->columns(2)

                        ->options([
                            'nomor_register' => 'Nomor Register',
                            'tanggal_register' => 'Tanggal Register',
                            'jenis_tindak_pidana' => 'Jenis Tindak Pidana',
                            'jenis' => 'Jenis',
                            'jumlah' => 'Jumlah',
                            'gudang' => 'Gudang',
                            'tersangka' => 'Tersangka',
                            'kondisi_awal' => 'Kondisi Awal',
                            'nilai_perkiraan_awal' => 'Nilai Perkiraan Awal',
                            'nilai_perkiraan_akhir' => 'Nilai Perkiraan Akhir',
                            'status_tingkat_pemeriksaan' => 'Status Tingkat Pemeriksaan',
                            'jaksa_penitip' => 'Jaksa Penitip',
                        ])
                        ->default([
                            'nomor_register', 'tanggal_register', 'jenis_tindak_pidana', 'jenis', 'jumlah', 'gudang', 'tersangka', 'nilai_perkiraan_awal', 'nilai_perkiraan_akhir', 'kondisi_awal', 'status_tingkat_pemeriksaan', 'jaksa_penitip',
                        ]),
                    Select::make('category_id')
                        ->label('Pilih Kategori')
                        ->options(\App\Models\Category::pluck('name', 'id'))
                        ->native(false)
                        ->nullable(),
                    Select::make('kondisi')
                        ->label('Pilih Kondisi')
                        ->options(\App\Enums\ItemStatus::class)
                        ->native(false)
                        ->nullable(),
                ])
                ->action(function (array $data) {
                    $params = [];
                    if (isset($data['category_id'])) {
                        $params['categoryId'] = $data['category_id'];
                    }
                    if (isset($data['kondisi'])) {
                        $params['kondisi'] = $data['kondisi'];
                    }
                    if (isset($data['fields'])) {
                        $params['fields'] = [...$data['fields']];
                    }

                    return redirect()
                        ->route('items.download', $params);
                }),
            Actions\CreateAction::make(),
        ];
    }
}
