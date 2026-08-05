<?php

use Illuminate\Support\Facades\Route;
use Modules\Gallery\Http\Controllers\Admin\GalleryController;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::resource('galleries', GalleryController::class)->names('galleries');
});

Route::get('/gallery', [\Modules\Gallery\Http\Controllers\Front\GalleryController::class, 'index'])->name('home.gallery');
