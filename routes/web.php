<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Layout Homepage Guest
Route::get('', 'Guest\PublicController@index')->name('public-home');

// Layout ristorante Guest
Route::get('business/{business}', 'Guest\PublicController@show_business')->name('public-business');

//checkout
Route::get('/checkout/{business}', 'Guest\OrderController@checkout')->name('cart-checkout');
Route::post('/checkout/payment', 'Guest\OrderController@store')->name('order-payment');

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
