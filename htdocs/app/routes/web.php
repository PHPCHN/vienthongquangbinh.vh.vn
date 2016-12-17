<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
  'as' => 'user.index',
  'uses' => 'HomeController@index',
]);

Route::get('test', function(){
  $str = "<p>2.0Mp, zoom quang 40x, zoom số 16x</p><p>25/30fps@(1920x1080), 25/30/50/60fps@ 1.0Mp, 3DNR</p><p>Hỗ trợ chức năng tuần tra th&ocirc;ng minh autotracking</p><p>Hỗ trợ thẻ nhớ tối đa 64gb</p><p>Hỗ trợ &acirc;m thanh 2 chiều.</p><p>Tầm xa hồng ngoại: 500m</p><p>Chuẩn chống nước v&agrave; bụi IP67</p><p>Nhiệt độ hoạt động -40~+70&deg;C</p>";
  echo $str;
});

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
