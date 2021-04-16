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

// visualizzazione homepage
Route::get('', 'Guest\HomeController@index')->name('home');

// visualizzazione ristoranti
Route::get('search', 'Guest\HomeController@businessList')->name('business-list');


Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
  Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
  Route::resource('business', BusinessController::Class);
  Route::resource('product', ProductController::Class);
});
