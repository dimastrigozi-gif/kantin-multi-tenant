<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::prefix('kantin/{canteen:slug}')
    ->name('customer.')
    ->group(base_path('routes/customer.php'));

Route::prefix('tenant/{tenant:slug}')
    ->name('tenant.')
    ->middleware(['auth', 'verified'])
    ->scopeBindings()
    ->group(base_path('routes/tenant.php'));

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified'])
    ->group(base_path('routes/admin.php'));

require __DIR__.'/settings.php';
