<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

require base_path('routes/adminRoute.php');
require base_path('routes/profileRoute.php');

//views general
Route::group(['middleware' => ['check.auth']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/{categorySlug}/product/{productSlug}', [ProductController::class, 'productView'])
        ->name('product.view');
    Route::get('/category/{categorySlug}', [CategoryController::class, 'categoryView'])->name('category.view');
});

//view error page
Route::fallback(function () {
    return view('components.404');
});
