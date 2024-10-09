<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register'])->name('api.user.register');
Route::get('/product/{id}', [ProductController::class, 'productInfo'])->name('api.product.info');
