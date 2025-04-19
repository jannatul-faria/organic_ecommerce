<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscriberController;
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
    Route::delete('delete-country/{id}', [CountryController::class, 'deleteCountry'])->name('delete.country');
    
    Route::get('edit-country/{id}', [CountryController::class, 'editCountry'])->name('edit.country');
    Route::put('update-country/{id}', [CountryController::class, 'updateCountry'])->name('update.country');


    // state manage
    Route::get('all-states', [StateController::class, 'allStates'])->name('all.states');
    Route::get('add-states', [StateController::class, 'addState'])->name('add.state');
    Route::post('add-states', [StateController::class, 'storeState'])->name('store.state');
    Route::delete('delete-state/{id}', [StateController::class, 'deleteState'])->name('delete.state');

    Route::get('edit-states/{id}', [StateController::class, 'editState'])->name('edit.state');
    Route::put('update-states/{id}', [StateController::class, 'updateState'])->name('update.state');


     // city manage
    Route::get('all-cities', [CityController::class, 'allCities'])->name('all.cities');
    Route::get('add-cities', [CityController::class, 'addCity'])->name('add.city');
    Route::post('add-cities', [CityController::class, 'storeCity'])->name('store.city');
    Route::delete('delete-city/{id}', [CityController::class, 'deleteCity'])->name('delete.city');
    Route::get('get-states',[CityController::class, 'getStates']);

    Route::get('edit-country/{id}', [CountryController::class, 'editCountry'])->name('edit.country');
    Route::put('update-country/{id}', [CountryController::class, 'updateCountry'])->name('update.country');

    
// subscriber
    Route::get('subscribers',[SubscriberController::class, 'allSubscribers'])->name('all.subscriber');

    // ============== attributte manage================
    // category manage:
    Route::get('all-categories', [CategoryController::class, 'allCategories'])->name('all.categories');
    Route::get('add-category', [CategoryController::class, 'addCategory'])->name('add.category');
    Route::post('add-category', [CategoryController::class, 'storeCategory'])->name('store.category');
    Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

     // sub-category manage:
     Route::get('all-sub-categories', [SubCategoryController::class, 'allSubCategories'])->name('all.sub.categories');
     Route::get('add-sub-category', [SubCategoryController::class, 'addSubCategory'])->name('add.sub.category');
     Route::post('add-sub-category', [SubCategoryController::class, 'storeSubCategory'])->name('store.sub.category');
     Route::delete('delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');
 
    // child-category manage:
    Route::get('all-child-categories', [ChildCategoryController::class, 'allChildCategories'])->name('all.child.categories');
    Route::get('add-child-category', [ChildCategoryController::class, 'addChildCategory'])->name('add.child.category');
    Route::post('store-child-category', [ChildCategoryController::class, 'storeChildCategory'])->name('store.child.category');
    Route::delete('delete-child-category/{id}', [ChildCategoryController::class, 'deleteChildCategory'])->name('delete.child.category');

    Route::get('get-sub-categories',[ChildCategoryController::class, 'getSubCategory']);


});
