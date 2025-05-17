<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ItemTrend extends ChartWidget
{
    protected static ?string $heading = 'Trend Barang';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Grafik total per bulan tahun '.now()->subYear()->format('Y'),
                    'data' => $this->getCountPerMonth(),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getCountPerMonth(): array
    {
        $year = now()->subYear();
        $counts = [];

        for ($month = 1; $month <= 12; $month++) {
            $count = DB::table('items')
                ->whereYear('tanggal_register', $year)
                ->whereMonth('tanggal_register', $month)
                ->count();
            $counts[] = $count;
        }

        return $counts;
    }
}
