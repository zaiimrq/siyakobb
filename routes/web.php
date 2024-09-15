<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Volt::route('/create', 'items.create')->name('items.create');
