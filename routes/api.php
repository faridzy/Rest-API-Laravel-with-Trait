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

Route::group(['prefix' => 'coba','middleware'=>'coba'], function(){
    Route::post('/home', 'HomeController@create');
  
});

Route::group(['prefix'=>'book'], function(){
 	Route::get('/', 'BookController@index');
    Route::get('/show/{id}', 'BookController@show');
    Route::post('/create', 'BookController@create');
    Route::put('/update/{id}', 'BookController@update');
    Route::delete('/delete/{id}', 'BookController@delete');
});



