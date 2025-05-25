<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\ItemResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;

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
                ->modalWidth(MaxWidth::Large)
                ->form([
                    Select::make('category_id')
                        ->label('Pilih Kategori')
                        ->options(\App\Models\Category::pluck('name', 'id'))
                        ->native(false)
                        ->nullable(),
                    Select::make('status')
                        ->label('Pilih Kondisi')
                        ->options(\App\Enums\ItemStatus::class)
                        ->native(false)
                        ->nullable(),
                ])
                ->action(function (array $data) {
                    $params = [];
                    if (isset($data['category_id'])) {
                        $params['categoryId'] = $data['category_id'];
                    }
                    if (isset($data['status'])) {
                        $params['status'] = $data['status'];
                    }

                    return redirect()
                        ->route('items.download', $params);
                }),
            Actions\CreateAction::make(),
        ];
    }
}
