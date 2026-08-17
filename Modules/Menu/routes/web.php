<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MenuController;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function(){
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('menus', MenuController::class)->names('menus');
    });
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function(){
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('menus', MenuController::class)->names('menus');
    });
});
