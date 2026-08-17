<?php

use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\SliderController;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function() {
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('sliders', SliderController::class)->names('sliders');
    });
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function() {
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('sliders', SliderController::class)->names('sliders');
    });
});
