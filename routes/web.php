<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [IndexController::class, '__invoke'])->name('index');

Route::get('/register', function () {
    return view('auth.register');
});
Auth::routes();

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('add');
    
Route::post('/cart/plus/{id}', [CartController::class,'plus' ])
    ->where('id', '[0-9]+')
    ->name('cart.plus');
Route::post('/cart/minus/{id}', [CartController::class,'minus' ])
    ->where('id', '[0-9]+')
    ->name('cart.minus');
    
Route::get('/catalog', [CatalogController::class,'index'])->name('catalog.index');
Route::get('/catalog/index', [CatalogController::class,'index'])->name('catalog.index');
Route::get('/catalog/category/{slug}', [CatalogController::class,'category'])->name('catalog.category');
Route::get('/catalog/provider/{slug}', [CatalogController::class,'provider'])->name('catalog.provider');
Route::get('/catalog/product/{name}', [CatalogController::class,'product'])->name('catalog.product');

Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/1',[ProductController::class,'productList']);