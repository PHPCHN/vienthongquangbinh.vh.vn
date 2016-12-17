<?php

Route::get('login', [
  'as' => 'login',
  'uses' => 'AuthController@getLogin',
]);

Route::post('login', [
  'as' => 'login-post',
  'uses' => 'AuthController@postLogin',
]);

Route::get('logout', [
  'as' => 'logout',
  'uses' => 'AuthController@getLogout',
]);

Route::get('images', [
  'as' => 'images',
  'uses' => 'SliderController@browseImage',
]);

Route::post('uploadImage', [
  'as' => 'upload.image',
  'uses' => 'SliderController@uploadImage',
]);

Route::get('admin', [
  'as' => 'admin',
  'uses' => 'AuthController@index',
]);

Route::group(['prefix' => 'admin'], function () {
  Route::resource('product', 'ProductController');

  Route::post('product/{product}/top', [
    'as' => 'admin.product.top',
    'uses' => 'ProductController@set_top',
  ]);

  Route::post('product/{product}/home', [
    'as' => 'admin.product.home',
    'uses' => 'ProductController@set_home',
  ]);

  Route::post('product/{product}/tab', [
    'as' => 'admin.product.tab',
    'uses' => 'ProductController@set_tab',
  ]);

  Route::post('product/{product}/new', [
    'as' => 'admin.product.new',
    'uses' => 'ProductController@set_new',
  ]);

  Route::post('product/{product}/pro', [
    'as' => 'admin.product.pro',
    'uses' => 'ProductController@set_pro',
  ]);

  Route::resource('news', 'NewsController');

  Route::resource('project', 'ProjectController');

  Route::post('project/{project}/top', [
    'as' => 'admin.project.top',
    'uses' => 'ProjectController@set_top',
  ]);

  Route::post('project/{project}/dur', [
    'as' => 'admin.project.dur',
    'uses' => 'ProjectController@set_dur',
  ]);

  Route::post('project/{project}/pro', [
    'as' => 'admin.project.pro',
    'uses' => 'ProjectController@set_pro',
  ]);
});
