<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

Route::get('auth/token','Auth\AuthController@getToken');
Route::post('auth/token','Auth\AuthController@postToken');
Route::post('auth/twofactor/enable','Auth\TwoFactorController@postEnable');
Route::post('auth/twofactor/disable','Auth\TwoFactorController@postDisable');

Route::get('/home', 'HomeController@index');
