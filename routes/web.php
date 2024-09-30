<?php

use App\Http\Middleware\EnsureAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'index')->name('home');
Route::prefix('items')
    ->name('items.')
    ->middleware(['auth', EnsureAdminMiddleware::class])
    ->group(function () {
        Volt::route('/', 'items.index')->name('index');
        Volt::route('/create', 'items.create')->name('create');
        Volt::route('/{item}', 'items.show')->name('show');
        Volt::route('/{item}/edit', 'items.edit')->name('edit');
    });

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Volt::route('/auth/login', 'auth.login')->name('login');
    Volt::route('/auth/register', 'auth.register')->name('register');
});

Route::get('/auth/logout', function () {
    Auth::logout();
    request()->session()->regenerateToken();

    return to_route('login');
})
    ->middleware(['auth'])
    ->name('logout');
