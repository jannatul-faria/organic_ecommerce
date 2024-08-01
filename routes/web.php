<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;

// <====================== FRONTEND ROUTES ======================>
Route::get('/', [WebsiteController::class, 'home'])->name('web.home');
Route::get('/shop', [WebsiteController::class, 'shop'])->name('web.shop');
Route::get('/shop-detail', [WebsiteController::class, 'shopDetail'])->name('web.shop.detail');
Route::get('/shopping-cart', [WebsiteController::class, 'shoppingCart'])->name('web.shopping.cart');

Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('web.blogs');
Route::get('/single-blog/{blog}', [WebsiteController::class, 'singleBlog'])->name('web.single.blog');

Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('web.about-us');
Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('web.contact-us');

Route::get('/check-out', [WebsiteController::class, 'checkOut'])->name('web.checkOut');
Route::get('/pages/{slug}', [WebsiteController::class, 'singlePage'])->name('web.singlePage');


// <=======================Backend Routes ==============================>
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    
});








require __DIR__ .'/auth.php';