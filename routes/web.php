<?php

use App\Http\Middleware\SubdomainMiddleware;
use App\Http\Middleware\MerchantUserRole;
use App\Http\Middleware\AdminUserRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Auth::routes(); 
Route::domain('{store}.localhost')->middleware(SubdomainMiddleware::class)->group(function () {
    Route::get('/', [HomeController::class, 'storeHome'])->name('store.home');
    Route::get('/category/{slug}', [HomeController::class, 'archive'])->name('store.category.product');
});
 
Route::middleware(MerchantUserRole::class)->group(function () {
    Route::group(['as' => 'merchant.', 'prefix' => 'merchant'], function () {
        Route::get('/dashboard', [MerchentController::class, 'index'])->name('home');
        Route::get('/store', [MerchentController::class, 'storeManage'])->name('store.index');
        Route::post('/store/create', [MerchentController::class, 'storeCreate'])->name('store.create');
        Route::get('/category', [MerchentController::class, 'categoryManage'])->name('category.index');
        Route::post('/category/create', [MerchentController::class, 'categoryCreate'])->name('category.create');
        Route::get('/product', [MerchentController::class, 'productManage'])->name('product.index');
        Route::post('/product/create', [MerchentController::class, 'productCreate'])->name('product.create');
        Route::get('/get-categories/{id}', [MerchentController::class, 'getCategoryByStore'])->name('product.category');

    });
});

Route::middleware(AdminUserRole::class)->group(function () {
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('home');
    });
});

Route::get('/', function () {
    return view('auth.login');
}); 
