<?php

use App\Http\Controllers\ItemDownloadController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::get('/{item}', fn(Item $item) => view('items.show', ['item' => $item]))->name('items.show');

Route::get('/items/download', ItemDownloadController::class)
    ->middleware(['auth'])
    ->name('items.download');

Route::get('/debug', function () {
    dd(now());
})->name('debug');
