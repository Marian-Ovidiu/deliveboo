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


Auth::routes();

Route::get('', 'PublicController@index')->name('public-index');

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
  Route::resource('businesses', BusinessController::Class);
  Route::resource('products', ProductsController::Class);
});
