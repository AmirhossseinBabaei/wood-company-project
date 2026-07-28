<?php

use Illuminate\Support\Facades\Route;
use Modules\HomePage\Http\Controllers\HomePageController;


Route::get('/', [HomePageController::class, 'index']);
