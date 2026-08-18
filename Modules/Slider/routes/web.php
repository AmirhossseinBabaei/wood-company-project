<?php

use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\SliderController;

//Persian lang for management sliders
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function () {
    Route::middleware('auth')->resource('dashboard/sliders', SliderController::class)->names('dashboard.sliders');
});

//English lang for management sliders
Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function () {
    Route::middleware('auth')->resource('dashboard/sliders', SliderController::class)->names('dashboard.sliders');
});
