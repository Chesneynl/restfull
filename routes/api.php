<?php

use Illuminate\Http\Request;

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


Route::get('dealers', 'DealerController@index');

Route::get('dealer/{id}', 'DealerController@show');

Route::post('dealer', 'DealerController@store');

Route::put('dealer', 'DealerController@store');

Route::delete('dealer/{id}', 'DealerController@destroy');

Route::options('dealers', 'DealerController@index');