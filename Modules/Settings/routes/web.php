<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.show');
        Route::post('settings/update', [SettingsController::class, 'updateOrCreate'])->name('settings.update');
    });
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.show');
        Route::post('settings/update', [SettingsController::class, 'updateOrCreate'])->name('settings.update');
    });
});
