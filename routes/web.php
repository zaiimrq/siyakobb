<?php

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

// Route::get('/', function () {
//     $query = Item::query();

//     if (request('search')) {
//         $query->where(function($q) {
//             $search = request('search');
//             $q->where('jenis', 'like', '%' . $search . '%')
//               ->orWhere('nomor_register', 'like', '%' . $search . '%')
//               ->orWhere('tersangka', 'like', '%' . $search . '%');
//         });
//     }

//     if (request('category')) {
//         $query->whereHas('category', function($q) {
//             $q->where('name', request('category'));
//         });
//     }

//     $items = $query->latest('tanggal_register')->take(24)->get();
//     return view('welcome', compact('items'));
// });


Route::get('/', WelcomeController::class)->name('welcome');

Route::get('/items/{item}', function (Item $item) {
    return view('items.show', compact('item'));
})->name('items.show');
