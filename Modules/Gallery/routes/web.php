<?php

use Illuminate\Support\Facades\Route;
use Modules\Gallery\Http\Controllers\Admin\GalleryController;
use App\Http\Middleware\FaLocale;
use App\Http\Middleware\EnLocale;

Route::middleware(FaLocale::class)->prefix('fa')->name('fa.')->group(function(){
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::resource('galleries', GalleryController::class)->names('galleries');
    });

    Route::get('gallery', [\Modules\Gallery\Http\Controllers\Front\GalleryController::class, 'index'])->name('home.gallery');
});

Route::middleware(EnLocale::class)->prefix('en')->name('en.')->group(function(){
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::resource('galleries', GalleryController::class)->names('galleries');
    });

    Route::get('gallery', [\Modules\Gallery\Http\Controllers\Front\GalleryController::class, 'index'])->name('home.gallery');
});
