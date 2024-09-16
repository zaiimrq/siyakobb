<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'index')->name('items.index');
Volt::route('/create', 'items.create')->name('items.create');
Volt::route('/{item?}', 'items.show')->name('items.show');
Volt::route('/{item}/edit', 'items.edit')->name('items.edit');

Volt::route('/auth/login', 'auth.login')->name('login');
