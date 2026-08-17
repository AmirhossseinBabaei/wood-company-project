<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactUs\Http\Controllers\AboutUsController;
use Modules\ContactUs\Http\Controllers\Admin\ContactController;
use Modules\ContactUs\Http\Controllers\Front\ContactController as FrontContactUs;

Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::prefix('contact-messages')->name('contact-us.')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('show/{contactMessage}', [ContactController::class, 'show'])->name('show');
            Route::post('read/{contactMessage}', [ContactController::class, 'read'])->name('read');
        });
    });

    Route::get('contact-us', [FrontContactUs::class, 'index'])->name('contact-us');
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');

    Route::post('contact-us/sendForm', [FrontContactUs::class, 'sendForm'])->name('contact-us.sendForm');
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::prefix('contact-messages')->name('contact-us.')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('show/{contactMessage}', [ContactController::class, 'show'])->name('show');
            Route::post('read/{contactMessage}', [ContactController::class, 'read'])->name('read');
        });
    });

    Route::get('contact-us', [FrontContactUs::class, 'index'])->name('contact-us');
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');

    Route::post('contact-us/sendForm', [FrontContactUs::class, 'sendForm'])->name('contact-us.sendForm');
});
