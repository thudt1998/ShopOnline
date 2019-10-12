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

//Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'UsersController@index')->name('user.loginPage');
    Route::post('/login', 'UsersController@login')->name('user.login');
    Route::post('/logout', 'UsersController@logout')->name('user.logout');
//});


