<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ItemTrend extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected static ?string $heading = 'Grafik Tren Bulanan';

    protected static ?string $description = 'Jumlah item per bulan yang terdaftar pada tahun ini.';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah item',
                    'data' => $this->getCountPerMonth(),
                    'fill' => 'start',
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
        $year = now()->year;
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
