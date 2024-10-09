<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

//views auth
Route::view('/login', 'components.front-end.auth.login')->name('login');
Route::view('/register', 'components.front-end.auth.signup')->name('register');
Route::view('/reset-password', 'components.front-end.auth.reset-pwd')->name('user.resetpwd');
Route::post('/login', [UserController::class, 'login'])->name('api.user.login');
Route::get('/logout', [UserController::class, 'userLogout'])->name('logout');

Route::group(['middleware' => ['user.auth', 'check.auth']], function () {
    //views user account info
    Route::get('/profile', [UserController::class, 'userOrders'])->name('profile');
    Route::get('/profile/setting', [UserController::class, 'userInfo'])->name('profile.setting');
    Route::get('/profile/address', [UserController::class, 'userAddress'])->name('profile.address');
    Route::get('/wish-list', [WishListController::class, 'wishList'])->name('profile.wish-list');

    //api requests
    Route::get('/profile/cart/info', [CartController::class, 'cartInfo'])->name('cart.info');
    Route::post('/profile/add-cart-item', [CartController::class, 'addCart'])->name('add.cart');
    Route::post('/profile/remove-cart-item', [CartController::class, 'removeCartItem'])->name('remove.cart');

    Route::post('/product/wish-list', [WishListController::class, 'addWishList'])->name('add.wish-list');
    Route::post('/product/remove-wish-list-item', [WishListController::class, 'removeWishListItem'])->name('remove.wish-list.item');
});
