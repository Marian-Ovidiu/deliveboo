<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/businesses', 'Api\ApiController@getBusinessesApi');
Route::get('/types', 'Api\ApiController@getTypesApi');
Route::get('/type/{name}','Api\ApiController@filterBusinessesByTypes');
Route::get('/businesses/{query}','Api\ApiController@filterBusinessesByName');
