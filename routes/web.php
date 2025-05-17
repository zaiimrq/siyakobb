<?php

use App\Http\Controllers\WelcomeController;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get(
    '/items/{item}',
    fn (Item $item) => view('items.show', ['item' => $item])
)->name('items.show');

Route::get('/items/all/download', function () {
    $items = Item::with('category')->get();
    $pdf = Pdf::loadView('pdfs.all-item', ['items' => $items])->setPaper('a4', 'landscape');

    return $pdf->download();

})
    ->middleware(['auth'])
    ->name('items.download');
