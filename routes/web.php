<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers;
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

Route::match(['get','post'],'/productlist', [ProductController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});

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


Route::get('/prod',[ProductController::class, 'index' ]
);

Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
})->middleware('auth')->name('password.confirm');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/basket/index', [BasketController::class, 'index']);
Route::get('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::post('/basket/add/{id}', 'BasketController@add')
    ->where('id', '[0-9]+')
    ->name('basket.add');