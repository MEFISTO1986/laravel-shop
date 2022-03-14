<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'list']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoriesController::class, 'category']);
Route::get('/product/{productId}', [\App\Http\Controllers\ProductController::class, 'product']);
