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

//Dealers
Route::get('dealers', 'DealerController@index');

Route::get('dealer/{id}', 'DealerController@show');

Route::post('dealer', 'DealerController@store');

Route::put('dealer', 'DealerController@store');

Route::delete('dealer/{id}', 'DealerController@destroy');


//Songs
Route::get('songs', 'SongController@index');

Route::get('song/{id}', 'SongController@show');

Route::post('song', 'SongController@store');

Route::put('song', 'SongController@store');

Route::delete('song/{id}', 'SongController@destroy');