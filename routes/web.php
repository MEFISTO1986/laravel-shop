<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin;
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

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin')->middleware(['auth','is_admin']);
Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'middleware' => 'is_admin',
        'prefix' => 'dashboard'
    ], function(){
        Route::get('/orders', [Admin\OrderController::class, 'index'])->name('admin-orders');

        Route::resource('/product', Admin\ProductController::class)->names([
            'edit' => 'products.form'
        ]);
        Route::resource('/category', Admin\CategoryController::class);

    });

    Route::post('/basket/add/{productId}', [BasketController::class, 'addProduct'])->name('basket-add');
    Route::group(['middleware' => 'basket_empty'], function() {
        Route::get('/basket', [BasketController::class, 'index'])->name('basket');
        Route::post('/basket/remove/{productId}', [BasketController::class, 'removeProduct'])->name('basket-remove');
    });


    Route::get('/order/checkout/', [OrderController::class, 'index'])->name('checkout');
    Route::post('/order/checkout/', [OrderController::class, 'checkout'])->name('make-checkout');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/categories', [CategoriesController::class, 'list'])->name('categoriesList');

Route::get('/products/{product:code}', [ProductController::class, 'product'])->name('product');

Route::get('/categories/{categories}', [CategoriesController::class, 'category'])->name('category')
    ->where(['categories' => '([A-Za-z0-9_\/]+)*']);
