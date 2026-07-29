<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\RegisterController;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])
        ->name('register');
});
