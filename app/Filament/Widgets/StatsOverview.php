<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Data', $this->getTotalItems())
                ->description('Total data diinput')
                ->color('primary'),
            Stat::make('Barang', $this->getSumTotalItems())
                ->description('Total barang rampasan dan sitaan')
                ->color('warning'),
            Stat::make('Users', $this->getTotalUsers())
                ->description('Total users')
                ->color('success'),
        ];
    }

    private function getTotalItems(): int
    {
        return DB::table('items')->count();
    }

    private function getSumTotalItems(): int
    {
        return DB::table('items')->sum('jumlah');
    }

    private function getTotalUsers(): int
    {
        return DB::table('users')->count();
    }
}
