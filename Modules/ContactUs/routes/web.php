<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactUs\Http\Controllers\Front\AboutUsController;
use Modules\ContactUs\Http\Controllers\Admin\ContactController;
use Modules\ContactUs\Http\Controllers\Front\ContactController as FrontContactUs;
use Modules\ContactUs\Http\Controllers\Admin\TeamMemberController;

//Persian lang for contact messages and team member management
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

        //ContactMessage management dashboard routes
        Route::prefix('contact-messages')->name('contact-us.')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('show/{contactMessage}', [ContactController::class, 'show'])->name('show');
            Route::post('read/{contactMessage}', [ContactController::class, 'read'])->name('read');
        });

        Route::resource('team-members', TeamMemberController::class)->names('team-members');
    });

    //FrontEnd Routes
    Route::get('contact-us', [FrontContactUs::class, 'index'])->name('contact-us');
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');
    Route::post('contact-us/sendForm', [FrontContactUs::class, 'sendForm'])->name('contact-us.sendForm');
});

//English lang for contact messages and team member management
Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

        //ContactMessage management dashboard routes
        Route::prefix('contact-messages')->name('contact-us.')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('show/{contactMessage}', [ContactController::class, 'show'])->name('show');
            Route::post('read/{contactMessage}', [ContactController::class, 'read'])->name('read');
        });

        Route::resource('team-members', TeamMemberController::class)->names('team-members');
    });

    //FrontEnd Routes for contact-us, about-us and save contact-us from front-end page request
    Route::get('contact-us', [FrontContactUs::class, 'index'])->name('contact-us');
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');
    Route::post('contact-us/sendForm', [FrontContactUs::class, 'sendForm'])->name('contact-us.sendForm');
});
