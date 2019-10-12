<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showFormLogin')->name('admin.loginPage');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('channel', 'ChannelsController')->except('destroy');
    Route::get('channel/delete/{id}', ['as' => 'channel.delete', 'uses' => 'ChannelsController@destroy']);

    Route::resource('product-group', 'ProductGroupsController')->except('destroy');
    Route::get('product-group/delete/{id}', ['as' => 'product-group.delete', 'uses' => 'ProductGroupsController@destroy']);

    Route::resource('brand', 'BrandsController')->except('destroy');
    Route::get('brand/delete/{id}', ['as' => 'brand.delete', 'uses' => 'BrandsController@destroy']);

    Route::resource('product', 'ProductsController')->except('destroy');
    Route::get('product/delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductsController@destroy']);
});
