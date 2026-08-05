<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('login', [\Modules\Auth\Http\Controllers\LoginController::class, 'showForm'])
        ->name('loginForm');

    Route::post('login', [\Modules\Auth\Http\Controllers\LoginController::class, 'login'])
        ->name('login');

    Route::get('logout', [\Modules\Auth\Http\Controllers\LogoutController::class, 'logout'])
        ->name('logout');
});

//dashboard route
Route::middleware('auth')
    ->get('dashboard', [\Modules\Auth\Http\Controllers\DashboardController::class, 'dashboard'])
    ->name('dashboard');

Route::get('hash', function(){
    dd(\Illuminate\Support\Facades\Hash::make('hosein'));
});
