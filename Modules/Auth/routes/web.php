<?php

use Illuminate\Support\Facades\Route;

//Authentication Routes.
Route::prefix('auth')
    ->middleware(\App\Http\Middleware\Guest::class)
    ->name('auth.')->group(function () {

        Route::get('login', [\Modules\Auth\Http\Controllers\LoginController::class, 'showForm'])
            ->name('loginForm');

        Route::post('login', [\Modules\Auth\Http\Controllers\LoginController::class, 'login'])
            ->name('login');

        Route::get('logout', [\Modules\Auth\Http\Controllers\LogoutController::class, 'logout'])
            ->name('logout');
    });

//Persian lang for dashboard routes
Route::prefix('fa')->middleware([\App\Http\Middleware\FaLocale::class, 'auth',])->name('fa.')->group(function () {
    Route::get('dashboard', [\Modules\Auth\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
});

//English lang for dashboard routes
Route::prefix('en')->middleware([\App\Http\Middleware\EnLocale::class, 'auth',])->name('en.')->group(function () {
    Route::get('dashboard', [\Modules\Auth\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
});
