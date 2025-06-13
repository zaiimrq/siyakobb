<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\CategoryResource;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    public function redirectToDownload()
    {
        $this->redirectRoute('items.download', [
            'fields' => Schema::getColumnListing('items'),
            'signature_date' => now()->toDateString(),
        ]);
        // return Action::make('print')
        //     ->label('Download')
        //     ->icon('heroicon-m-arrow-down-tray')
        //     ->color('success')
        //     ->modalWidth(MaxWidth::Large)
        //     ->form([
        //         DatePicker::make('signature_date')
        //             ->label('Tanggal')
        //             ->default(now())
        //             ->required(),
        //     ])->action(function (array $data): void {
        //         $this->redirectRoute('items.download', [
        //             'fields' => Schema::getColumnListing('items'),
        //             'signature_date' => $data['signature_date'],
        //         ]);
        //     });
    }

    public function redirectToGolongan(): void
    {
        if (Auth::user()->isAdmin()) {
            $this->redirect(CategoryResource::getUrl('index'), navigate: true);
        }
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Data', Number::format($this->getTotalItems()))
                ->description('Total data diinput')
                ->icon('heroicon-o-document-text')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => 'redirectToDownload',
                ]),
            Stat::make('Golongan', Number::format($this->getTotalGolongan()))
                ->description('Total golongan')
                ->icon('heroicon-o-tag')
                ->color('primary')
                ->extraAttributes(Auth::user()->isAdmin() ? [
                    'class' => 'cursor-pointer',
                    'wire:click' => 'redirectToGolongan',
                ] : []),
            Stat::make('Users', Number::format($this->getTotalUsers()))
                ->description('Total users')
                ->icon('heroicon-o-users')
                ->color('primary'),
        ];
    }

    private function getTotalItems(): int
    {
        return DB::table('items')->count();
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
