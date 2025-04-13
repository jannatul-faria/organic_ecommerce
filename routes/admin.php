<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;


// <=======================Backend Routes ==============================>
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // country manage
    Route::get('all-countries', [CountryController::class, 'allcountries'])->name('all.countries');
    Route::get('add-country', [CountryController::class, 'addCountry'])->name('add.country');
    Route::post('add-country', [CountryController::class, 'storeCountry'])->name('store.country');

    // state manage
    Route::get('all-states', [StateController::class, 'allStates'])->name('all.states');
    Route::get('add-states', [StateController::class, 'addState'])->name('add.state');
    Route::post('add-states', [StateController::class, 'storeState'])->name('store.state');

     // city manage
     Route::get('all-cities', [CityController::class, 'allCities'])->name('all.cities');
     Route::get('add-cities', [CityController::class, 'addCity'])->name('add.city');
     Route::post('add-cities', [CityController::class, 'storeCity'])->name('store.city');







});
