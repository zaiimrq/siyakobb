<?php

use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get(
    '/items/{item}',
    fn (Item $item) => view('items.show', ['item' => $item])
)->name('items.show');

Route::get('/items/all/download', function (Request $request) {
    $items = Pipeline::send(Item::query())
        ->through([
            \App\Filters\Item\ByCategoryItem::class,
            \App\Filters\Item\ByStatusItem::class,
        ])
        ->thenReturn()
        ->orderBy('created_at', 'desc')
        ->with('category')
        ->get();

    $pdf = Pdf::loadView('pdfs.all-item', ['items' => $items])->setPaper('a4', 'landscape');

    return $pdf->download();
})
    ->middleware(['auth'])
    ->name('items.download');
