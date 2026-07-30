<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\RegisterController;
use Modules\Authentication\Http\Controllers\LoginController;
use Modules\Authentication\Http\Controllers\LogoutController;
use Modules\Authentication\Http\Controllers\ProfileController;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');

    Route::post('login', [LoginController::class, 'login'])
        ->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

        Route::get('profile', [ProfileController::class, 'getProfile'])->name('profile.show');
        Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    });
});
