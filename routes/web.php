<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/order/checkout/', [OrderController::class, 'index'])->name('checkout');
Route::post('/order/checkout/', [OrderController::class, 'checkout'])->name('make-checkout');

Route::get('/basket', [BasketController::class, 'index'])->name('basket')->middleware('auth');
Route::post('/basket/add/{productId}', [BasketController::class, 'addProduct'])->name('basket-add');
Route::post('/basket/remove/{productId}', [BasketController::class, 'removeProduct'])->name('basket-remove');

Route::get('/categories', [CategoriesController::class, 'list'])->name('categoriesList');
Route::get('/{category}', [CategoriesController::class, 'category'])->name('category');

Route::get('/{category}/{product}', [ProductController::class, 'product'])->name('product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
