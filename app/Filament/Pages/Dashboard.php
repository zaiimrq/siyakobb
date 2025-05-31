<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Filament\Widgets\ItemPerCategoryChart;
use App\Filament\Widgets\ItemStatusChart;
use App\Filament\Widgets\ItemTrend;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\WelcomeStats;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            WelcomeStats::class,
            StatsOverview::class,
            ItemTrend::class,
            ItemStatusChart::class,
            ItemPerCategoryChart::class,
        ];
    }
}
