<?php

use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\SliderController;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('sliders', SliderController::class)->names('sliders');
});
