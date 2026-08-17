<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\HomeController;
use App\Http\Middleware\FaLocale;
use App\Http\Middleware\EnLocale;

Route::redirect('/', '/fa');

Route::middleware(FaLocale::class)->get('/fa', [HomeController::class, 'index'])->name('home.fa');
Route::middleware(EnLocale::class)->get('/en', [HomeController::class, 'index'])->name('home.en');
