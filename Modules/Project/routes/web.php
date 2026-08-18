<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Http\Controllers\Admin\ProjectController;
use Modules\Project\Http\Controllers\Admin\PropertyController;
use Modules\Project\Http\Controllers\Front\ProjectController as FrontProjectController;

//Persian lang for project, property management and front-end pages for show projects and single project
Route::middleware(\App\Http\Middleware\FaLocale::class)->prefix('fa')->name('fa.')->group(function() {

    //Management project and property
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('projects', ProjectController::class)->names('projects');
        Route::resource('properties', PropertyController::class)->names('properties');
    });

    //Project and single project page
    Route::get('projects', [FrontProjectController::class, 'index'])->name('projects');
    Route::get('{id}/{name}/projects', [FrontProjectController::class, 'show'])->name('projects.show');
});

Route::middleware(\App\Http\Middleware\EnLocale::class)->prefix('en')->name('en.')->group(function() {

    //Management project and property
    Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('projects', ProjectController::class)->names('projects');
        Route::resource('properties', PropertyController::class)->names('properties');
    });

    //Project and single project page
    Route::get('projects', [FrontProjectController::class, 'index'])->name('projects');
    Route::get('{id}/{name}/projects', [FrontProjectController::class, 'show'])->name('projects.show');
});
