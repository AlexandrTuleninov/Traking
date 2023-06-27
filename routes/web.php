<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

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
    ->name('cart.add');
    
Route::post('/cart/plus/{id}', [CartController::class,'plus' ])
    ->where('id', '[0-9]+')
    ->name('cart.plus');
Route::post('/cart/minus/{id}', [CartController::class,'minus' ])
    ->where('id', '[0-9]+')
    ->name('cart.minus');
    
Route::get('/catalog', [CatalogController::class,'index'])->name('catalog');
Route::get('/catalog/category/{slug}', [CatalogController::class,'category'])->name('catalog.category');
Route::get('/catalog/provider/{slug}', [CatalogController::class,'provider'])->name('catalog.provider');
Route::get('/catalog/product/{slug}', [CatalogController::class,'product'])->name('catalog.product');

Route::get('/category',[CategoryController::class,'add']);

Route::get('/cart/index', [CartController::class, 'index'])->name('cart');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/1',[ProductController::class,'productList']);

Route::match(array('GET', 'POST'),'/order/add',[OrderController::class,'add'])->name('order.add');

Route::match(array('GET', 'POST'),'/product/add/index',[ProductController::class, 'addIndex'])->name('product.add.index');
Route::post('/product/add',[ProductController::class,'add'])->name('product.add');