<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.show');
    Route::post('settings/update', [SettingsController::class, 'updateOrCreate'])->name('settings.update');
});
