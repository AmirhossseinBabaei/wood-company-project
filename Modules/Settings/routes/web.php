<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

//Persian lang for management settings of website
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        //show setting
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.show');
        //update setting
        Route::post('settings/update', [SettingsController::class, 'updateOrCreate'])->name('settings.update');
    });
});

//English lang for management settings of website
Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        //show setting
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.show');
        //update setting
        Route::post('settings/update', [SettingsController::class, 'updateOrCreate'])->name('settings.update');
    });
});
