<?php

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


Auth::routes();

// Layout Homepage Guest
Route::get('', 'Guest\PublicController@index')->name('public-home');
// Layout ristorante Guest
Route::get('business', 'Guest\PublicController@show_business')->name('public-business');

// Carrello
Route::get('businesses', 'Guest\PublicController@cart_businesses_list')->name('cart-businesses-list');;
Route::get('businesses/{business}', 'Guest\PublicController@cart_business_menu')->name('cart-business-menu');

// Dashboard Ristoratore
Route::prefix('dashboard')
->namespace('Admin')
->middleware('auth')
->group(function () {
  Route::get('', 'DashboardController@index')->name('dashboard');
  Route::resource('business', BusinessController::Class);
  Route::resource('product', ProductController::Class);
  Route::get('business/{id}/add', 'ProductController@add')->name('add-prod');
});
