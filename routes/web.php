<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Layout Homepage Guest
Route::get('', 'Guest\PublicController@index')->name('public-home');

// Layout ristorante Guest
Route::get('business/{business}', 'Guest\PublicController@show_business')->name('public-business');

//Test Carrello
Route::get('cart/businesses', 'Guest\PublicController@cart_businesses_list')->name('cart-businesses-list');;
Route::get('cart/businesses/{business}', 'Guest\PublicController@cart_business_menu')->name('cart-business-menu');

//checkout
Route::get('/checkout/{business}', 'Guest\OrderController@checkout')->name('cart-checkout');

// Dashboard Ristoratore
// Route::prefix('dashboard')
// ->namespace('Admin')
// ->middleware('auth')
// ->group(function () {
//   Route::get('', 'DashboardController@index')->name('dashboard');
//   Route::resource('business', BusinessController::Class);
//   Route::resource('product', ProductController::Class);
//   Route::get('business/{id}/add', 'ProductController@add')->name('add-prod');
// });
