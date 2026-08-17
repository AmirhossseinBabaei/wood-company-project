<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function (){
    Route::middleware('auth')->name('dashboard.')->prefix('dashboard')->group(function () {
        Route::resource('users', UserController::class)->names('users');
    });
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function (){
    Route::middleware('auth')->name('dashboard.')->prefix('dashboard')->group(function () {
        Route::resource('users', UserController::class)->names('users');
    });
});
