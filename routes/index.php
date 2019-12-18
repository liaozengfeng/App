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
//商品展示
Route::any('/goods/goodslist','index\IndexController@goodslist');
//分类展示
Route::any('/sort/sortlist','index\IndexController@sortlist');
//商品详情
Route::any('/goods/goodsinfo','index\IndexController@goodsinfo');
//首页分类
Route::any('/sort/sorttop','index\IndexController@sorttop');
//首页轮播图
Route::any('/gures/gures','index\IndexController@gures');
//加入购物车
Route::any('/car/car','index\IndexController@car');
