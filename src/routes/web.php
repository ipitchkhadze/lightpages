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

Route::group(['prefix' => 'admin', 'middleware' => 'web'], function() {
    Route::get('/pages/data', ['as' => 'pages.data', 'uses' => 'Ipitchkhadze\LightPages\App\Http\Controllers\LightPagesController@data']);
    Route::resource('/pages', 'Ipitchkhadze\LightPages\App\Http\Controllers\LightPagesController');

    Route::get('/lang/data', ['as' => 'lang.data', 'uses' => 'Ipitchkhadze\LightPages\App\Http\Controllers\LangController@data']);
    Route::resource('/lang', 'Ipitchkhadze\LightPages\App\Http\Controllers\LangController');
});
