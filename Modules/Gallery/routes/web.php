<?php

use App\Http\Middleware\EnLocale;
use App\Http\Middleware\FaLocale;
use Illuminate\Support\Facades\Route;
use Modules\Gallery\Http\Controllers\Admin\GalleryController;

//Persian lang for gallery routes
Route::middleware(FaLocale::class)->prefix('fa')->name('fa.')->group(function () {

    //dashboard gallery management routes
    Route::middleware('auth')->resource('dashboard/galleries', GalleryController::class)->names('dashboard.galleries');

    //front gallery page route
    Route::get('gallery', [\Modules\Gallery\Http\Controllers\Front\GalleryController::class, 'index'])->name('home.gallery');
});

//English lang for gallery routes
Route::middleware(EnLocale::class)->prefix('en')->name('en.')->group(function () {

    //dashboard gallery management routes
    Route::middleware('auth')->resource('dashboard/galleries', GalleryController::class)->names('dashboard.galleries');

    //front gallery page route
    Route::get('gallery', [\Modules\Gallery\Http\Controllers\Front\GalleryController::class, 'index'])->name('home.gallery');
});
