<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactUs\Http\Controllers\ContactUsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('contactuses', ContactUsController::class)->names('contactus');
});
