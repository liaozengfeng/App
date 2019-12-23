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
//收货地址展示
Route::any('/address/list','index\IndexController@order');
//商品展示
Route::any('/goods/goodslist','index\IndexController@goodslist');
//分类展示
Route::any('/sort/sortlist','index\IndexController@sortlist');
//商品详情
Route::any('/goods/goodsinfo','index\IndexController@goodsinfo');
//商品排序
Route::any('/goods/goodsorder','index\IndexController@goodsorder');
//首页分类
Route::any('/sort/sorttop','index\IndexController@sorttop');
//首页轮播图
Route::any('/gures/gures','index\IndexController@gures');
//加入购物车
Route::any('/car/car','index\IndexController@car');
//注册
Route::any('/login/regist','index\IndexController@regist');
//登录
Route::any('/login/login','index\IndexController@login');
//用户展示
Route::any('/user/info','index\IndexController@info');


//购物车展示
Route::any('/car/catlist','index\IndexController@catlist');
//购物车商品数量显示
Route::any('/car/num','index\IndexController@num');

//订单商品展示
Route::any('/ord/orderlist','index\IndexController@orderlist');
//订单生成
Route::any('/ord/ordersave','index\IndexController@ordersave');
//订单商品展示
Route::any('/order/order_list','index\IndexController@order_list');

//收货地址添加
Route::any('/address/addresssave','index\IndexController@addresssave');
//收货地址删除
Route::any('/address/addressdel','index\IndexController@addressdel');
//收货地址修改默认
Route::any('/address/address_checked','index\IndexController@address_checked');
//收货地址订单页面展示
Route::any('/address/addresschecked','index\IndexController@addresschecked');

//商品收藏
Route::any('/collect/collect_save','index\IndexController@collect_save');
//商品展示
Route::any('/collect/collist','index\IndexController@collist');