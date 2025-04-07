<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;


// <=======================Backend Routes ==============================>
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // country manage
    Route::get('all-countries', [CountryController::class, 'allcountries'])->name('all.countries');





});
