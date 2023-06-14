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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/catalog/index', [CatalogController::class,'index'])->name('catalog.index');
Route::get('/catalog/category/{slug}', 'CatalogController@category')->name('catalog.category');
Route::get('/catalog/provider/{slug}', 'CatalogController@provider')->name('catalog.provider');
Route::get('/catalog/product/{slug}', 'CatalogController@product')->name('catalog.product');


Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->where('id', '[0-9]+')
    ->name('cart.add');
Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

