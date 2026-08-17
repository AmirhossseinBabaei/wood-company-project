.<?php

use Illuminate\Support\Facades\Route;
use Modules\Services\Http\Controllers\Admin\ServiceController;
use Modules\Services\Http\Controllers\Front\ServiceController as FrontServiceController;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::resource('services', ServiceController::class)->names('services');
    });
    Route::get('services', [FrontServiceController::class, 'index'])->name('services');
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::resource('services', ServiceController::class)->names('services');
    });
    Route::get('services', [FrontServiceController::class, 'index'])->name('services');
});
