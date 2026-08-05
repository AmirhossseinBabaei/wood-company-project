<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::middleware('auth')->name('dashboard.')->prefix('dashboard')->group(function(){
    Route::resource('users', UserController::class)->names('users');
});
