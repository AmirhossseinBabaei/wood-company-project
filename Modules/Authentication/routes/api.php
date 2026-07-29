<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\RegisterController;
use Modules\Authentication\Http\Controllers\LoginController;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');

    Route::post('login', [LoginController::class, 'login'])
        ->name('login');
});
