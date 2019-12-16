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



//三级联动
Route::any('/origin/index','index\IndexController@index');
//收货地址
Route::any('/order/list','index\IndexController@order');

Route::any('/goods/goodslist','index\IndexController@goodslist');
//分类 新闻
Route::any('/index/cart/list','index\CartController@list');
//今日新闻
Route::any('/index/news/list','index\TodayController@list');
//天气
Route::any('/index/weather/list','index\WeatherController@list');
Route::any('/index/weather/getWeather','index\WeatherController@getWeather');

//团队介绍
Route::any('/index/home','index\DeveloperController@home');

Route::group(['middleware'=>['Login']],function(){
    Route::any('/index/user/index','index\UserController@index');

});
