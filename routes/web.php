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

// Layout Homepage
Route::get('', 'Guest\HomeController@index')->name('home');
// Layout ristorante
Route::get('restaurant', 'Guest\RestaurantController@index')->name('restaurant');

// Carrello
Route::get('businesses', 'Guest\PublicController@index')->name('businesses-list');;
Route::get('businesses/{business}', 'Guest\PublicController@show')->name('business-menu');


Route::prefix('dashboard')
->namespace('Admin')
->middleware('auth')
->group(function () {
  Route::get('', 'DashboardController@index')->name('dashboard');
  Route::resource('business', BusinessController::Class);
  Route::resource('product', ProductController::Class);
  Route::get('business/{id}/add', 'ProductController@add')->name('add-prod');
});
