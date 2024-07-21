<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\frontend\cartcontroller;
use App\Http\Controllers\frontend\checkoutcontroller;
use App\Http\Controllers\frontend\frontendcontroller;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// frontend routes

Route::get('/', [frontendcontroller::class, 'index']);
Route::get('/search', [cartcontroller::class, 'search']);
Route::get('about', [frontendcontroller::class, 'about']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/category', [frontendcontroller::class, 'category']);
    Route::get('view-category/{slug}', [frontendcontroller::class, 'view_category']);
    Route::get('view-category/{cate_slug}/{prod_slug}', [frontendcontroller::class, 'prod_view']);
    Route::get('/user-items', [frontendcontroller::class, 'products']);


    // crat routes
    Route::post('addtocart', [cartcontroller::class, 'addCart']);
    Route::get('cart', [cartcontroller::class, 'viewcart']);
    Route::get('removecart/{id}', [cartcontroller::class, 'removecart']);
    Route::get('cartCount', [CartController::class, 'cratCount'])->name('crat.count');

    // product detail
    Route::get('product/detail/{id}', [ProductDetailController::class, 'index'])->name('product.detail');

    Route::post('/checkout', [checkoutcontroller::class, 'index']);
    Route::post('place-order', [checkoutcontroller::class, 'placeorder']);

    Route::get('checkoutqw', 'App\Http\Controllers\stripeCheckoutController@checkout');
    Route::post('checkoutqw', 'App\Http\Controllers\stripeCheckoutController@afterpayment')->name('checkout.credit-card');
});

// Admin Routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('layouts.index');
    });

    // Category Routes
    Route::get('addcategory', [categoryController::class, 'index']);
    Route::post('addcategory', [categoryController::class, 'store']);
    Route::get('showcate',  [categoryController::class, 'show']);
    Route::get('delete-category/{id}', [categoryController::class, 'delete']);
    Route::get('edit-category/{id}', [categoryController::class, 'edit']);
    Route::put('update-category/{id}', [categoryController::class, 'update']);

    // Products Route
    Route::get('products', [ProductController::class, 'index']);
    Route::get('addprod', [ProductController::class, 'create']);
    Route::post('addprod', [ProductController::class, 'store']);
    Route::get('edit-prod/{id}', [ProductController::class, 'edit']);
    Route::put('update-prod/{id}', [ProductController::class, 'update']);
    Route::get('delete-prod/{id}', [ProductController::class, 'delete']);

    Route::get('orders', [OrdersController::class, 'index']);
});
