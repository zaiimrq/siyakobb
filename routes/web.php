<?php

use App\Enums\ItemStatus;
use App\Filters\ItemFilter;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get(
    '/items/{item}',
    fn (Item $item) => view('items.show', ['item' => $item])
)->name('items.show');

Route::get('/items/all/download', function (Request $request) {
    $filter = new ItemFilter(
        categoryId: $request->integer('categoryId'),
        kondisi: $request->enum('kondisi', ItemStatus::class),
        fields: $request->array('fields')
    );
    $items = Item::query()
        ->with('category')
        ->tap($filter)
        ->orderBy('created_at', 'desc')
        ->get();
    $pdf = Pdf::loadView('pdfs.all-item', ['items' => $items])->setPaper('a4', 'landscape');

    return $pdf->download();
})
    ->middleware(['auth'])
    ->name('items.download');
