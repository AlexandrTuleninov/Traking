<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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


Route::get('/reg', function () {
    return view('reg');
});

Route::post('/reg', 'AuthController@postReg');
Route::get('/login', function () {
    return view('login');
});

Route::get('/user/{id}/profile', function ($id) {
    //
})->name('profile');

Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function() {
	Route::get('/login', function () {
		return view('login');
	});
	
	Route::post('/login', 'AuthController@postSignin'
	);
});



Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
})->middleware('auth')->name('password.confirm');


Auth::routes();



Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');