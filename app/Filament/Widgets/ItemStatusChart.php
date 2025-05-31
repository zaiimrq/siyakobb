<?php

namespace App\Filament\Widgets;

use App\Enums\ItemStatus;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ItemStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Barang';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Status Barang',
                    'data' => [$this->getTotalBaikStatus(), $this->getTotalRusakStatus(), $this->getTotalSebagianStatus()],
                    'backgroundColor' => [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
            'labels' => [
                ItemStatus::BAIK,
                ItemStatus::RUSAK,
                ItemStatus::SEBAGIAN,
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    private function getTotalBaikStatus(): int
    {
        return DB::table('items')->where('kondisi_awal', ItemStatus::BAIK)->count();
    }

    private function getTotalRusakStatus(): int
    {
        return DB::table('items')->where('kondisi_awal', ItemStatus::RUSAK)->count();
    }

    private function getTotalSebagianStatus(): int
    {
        return DB::table('items')->where('kondisi_awal', ItemStatus::SEBAGIAN)->count();
    }
}
