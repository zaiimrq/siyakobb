<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Data', Number::format($this->getTotalItems()))
                ->description('Total data diinput')
                ->color('primary'),
            Stat::make('Golongan', Number::format($this->getTotalGolongan()))
                ->description('Total golongan')
                ->color('primary'),
            Stat::make('Barang', Number::format($this->getSumTotalItems()))
                ->description('Total barang rampasan dan sitaan')
                ->color('warning'),
            Stat::make('Users', Number::format($this->getTotalUsers()))
                ->description('Total users')
                ->color('primary'),
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

    private function getTotalGolongan(): int
    {
        return DB::table('categories')->count();
    }
}
