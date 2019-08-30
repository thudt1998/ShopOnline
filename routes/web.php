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

Route::get(
    '/', function () {
    return view('welcome');
}
);

//Route::group(['middleware'=>'auth'],function (){
Route::group(
    ['prefix' => 'system'], function () {

    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

    Route::resource('channel', 'ChannelsController')->except('destroy');
    Route::get('channel/delete/{id}', ['as' => 'channel.delete', 'uses' => 'ChannelsController@destroy']);

    Route::resource('product-group', 'ProductGroupsController')->except('destroy');
    Route::get('product-group/delete/{id}', ['as' => 'product-group.delete', 'uses' => 'ProductGroupsController@destroy']);

    Route::resource('product', 'ProductsController')->except('destroy');
    Route::get('product/delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductsController@destroy']);
}
);


//});
