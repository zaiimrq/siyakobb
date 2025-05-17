<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

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
                ->url(route('items.download'))
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }
}
