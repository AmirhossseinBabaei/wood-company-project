<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

//Persian lang for management users
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function () {
    Route::middleware('auth')->resource('dashboard/users', UserController::class)->names('dashboard.users');
});

//English lang for management users
Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function () {
    Route::middleware('auth')->resource('dashboard/users', UserController::class)->names('dashboard.users');
});
