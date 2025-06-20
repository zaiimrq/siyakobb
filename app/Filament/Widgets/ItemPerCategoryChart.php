<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ItemPerCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Total Barang per Golongan';

    protected function getData(): array
    {
        return [
            'labels' => [...Category::query()->pluck('name')->toArray()],
            'datasets' => [[
                'label' => 'Total Items',
                'data' => [...Category::query()
                    ->withCount('items')
                    ->get()
                    ->pluck('items_count')
                    ->toArray()],
                'borderWidth' => 1,
            ]],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
