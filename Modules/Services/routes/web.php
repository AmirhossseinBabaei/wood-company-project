<?php

use Illuminate\Support\Facades\Route;
use Modules\Services\Http\Controllers\Admin\ServiceController;
use Modules\Services\Http\Controllers\Front\ServiceController as FrontServiceController;

//Persian lang for management services and front-end for show services on the page
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function () {

    //management services
    Route::middleware('auth')->resource('dashboard/services', ServiceController::class)->names('dashboard.services');

    //front-end page for show services
    Route::get('services', [FrontServiceController::class, 'index'])->name('services');
});

//English lang for management services and front-end for show services on the page
Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function () {

    //management services
    Route::middleware('auth')->resource('dashboard/services', ServiceController::class)->names('dashboard.services');

    //front-end page for show services
    Route::get('services', [FrontServiceController::class, 'index'])->name('services');
});
