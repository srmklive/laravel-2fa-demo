<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('auth/token', 'Auth\TwoFactorController@showTokenForm');
Route::post('auth/token', 'Auth\TwoFactorController@validateTokenForm');
Route::post('auth/two-factor', 'Auth\TwoFactorController@setupTwoFactorAuth');

Route::get('/home', 'HomeController@index');
