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


Route::middleware('auth:eloquent')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/products','App\Http\Controllers\productsController@index');
    Route::post('/products','App\Http\Controllers\productsController@store');
    Route::put('/products/{id}','App\Http\Controllers\productsController@update');
    Route::delete('/products/{id}','App\Http\Controllers\productsController@destroy');
//});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    Route::post('/login', 'App\Http\Controllers\AuthController@login');  // 'App\Http\Controllers\AuthController@login');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('/me', 'App\Http\Controllers\AuthController@me');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');

});
