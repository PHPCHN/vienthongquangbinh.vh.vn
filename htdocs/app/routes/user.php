<?php

Route::get('/', [
  'as' => 'user.index',
  'uses' => 'IndexController@index',
]);

Route::get('pdt_udt', function(){
  $pdt_udt = require 'pdt_udt.php';
  return View::make('pdt_udt')->with('pdt_udt', $pdt_udt);
});

Route::get('sitemap.xml', [
  'as' => 'user.sitemap',
  'uses' => 'DetailController@sitemap',
]);

Route::get('lap-dat-camera-tai-{keyword}', [
  'as' => 'user.provs',
  'uses' => 'DetailController@provs',
]);

Route::get('lap-dat-camera-tai-{prov}/{keyword}', [
  'as' => 'user.prov.cities',
  'uses' => 'DetailController@prov_cities',
]);

Route::get('gioi-thieu', [
  'as' => 'user.about',
  'uses' => 'DetailController@abouts',
]);

Route::get('chinh-sach-{keyword}', [
  'as' => 'user.policy',
  'uses' => 'DetailController@policies',
]);

Route::get('tuyen-{keyword}', [
  'as' => 'user.recruit',
  'uses' => 'DetailController@recruits',
]);

Route::get('ho-tro-{keyword}', [
  'as' => 'user.support',
  'uses' => 'DetailController@supports',
]);

Route::get('kien-thuc-san-pham', [
  'as' => 'user.support.products',
  'uses' => 'DetailController@support_products',
]);

Route::get('kien-thuc-san-pham/{id}', [
  'as' => 'user.support.product.detail',
  'uses' => 'DetailController@support_product_detail',
]);

Route::get('tu-van-giai-phap-thiet-bi', [
  'as' => 'user.support.solutions',
  'uses' => 'DetailController@support_solutions',
]);

Route::get('tu-van-giai-phap-thiet-bi/{id}', [
  'as' => 'user.support.solution.detail',
  'uses' => 'DetailController@support_solution_detail',
]);

Route::get('khuyen-mai', [
  'as' => 'user.promotions',
  'uses' => 'DetailController@promotions',
]);

Route::get('khuyen-mai/{id}', [
  'as' => 'user.promotion.detail',
  'uses' => 'DetailController@promotion_detail',
]);

Route::get('qc', [
  'as' => 'user.ads',
  'uses' => 'DetailController@ads',
]);

Route::get('qc/{id}', [
  'as' => 'user.ads.detail',
  'uses' => 'DetailController@ads_detail',
]);

Route::get('download', [
  'as' => 'user.support.download',
  'uses' => 'DetailController@support_downloads',
]);

Route::get('search', [
  'as' => 'user.search',
  'uses' => 'IndexController@search',
]);

Route::get('dat-hang', [
  'as' => 'user.order',
  'uses' => 'OrderController@index',
]);

Route::post('dat-hang', [
  'as' => 'user.order-post',
  'uses' => 'OrderController@order',
]);

Route::get('cong-trinh', [
  'as' => 'user.projectall',
  'uses' => 'IndexController@projects',
]);

Route::get('cong-trinh/{project}', [
  'as' => 'user.project',
  'uses' => 'DetailController@project',
]);

Route::get('tin-tuc', [
  'as' => 'user.newsall',
  'uses' => 'IndexController@news',
]);

Route::get('tin-tuc/{news}', [
  'as' => 'user.news',
  'uses' => 'DetailController@news',
]);

Route::get('{cate}', [
  'as' => 'user.category',
  'uses' => 'IndexController@category',
]);

Route::get('{category}/{product}', [
  'as' => 'user.product',
  'uses' => 'DetailController@product_detail',
]);
