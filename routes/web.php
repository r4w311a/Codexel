<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/categories', function () {
    return view('sections.categories');
})->middleware(['auth'])->name('manage-categories');
require __DIR__ . '/auth.php';
