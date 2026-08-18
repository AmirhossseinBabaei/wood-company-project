<?php

use App\Http\Middleware\EnLocale;
use App\Http\Middleware\FaLocale;
use Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\HomeController;

Route::redirect('/', '/fa');

//Home page fa lang
Route::middleware(FaLocale::class)->get('fa', [HomeController::class, 'index'])->name('home.fa');

//Home page en lang
Route::middleware(EnLocale::class)->get('en', [HomeController::class, 'index'])->name('home.en');
