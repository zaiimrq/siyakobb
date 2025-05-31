<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class WelcomeStats extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $user = Auth::user();

        return [
            Stat::make('Welcome', str($user->name)->title() ?? 'Guest')
                ->description('Welcome to the dashboard 👋👋👋')
                ->label('Hello, '.str($user->role->value)->title() ?? 'Guest')
                ->icon('heroicon-o-sparkles')
                ->color('success'),
        ];
    }
}
