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

Route::get('/', function () {
    return view('welcome');
});


        //登录
//         Route::any('/login/login','login\LoginController@login');
//         //注册
//         Route::any('/login/register','login\LoginController@register');
//         //考试
//         Route::any('/exam','admin\ExamController@index');
//         Route::any('/list','admin\ExamController@list');
//         Route::any('/info','admin\ExamController@info');


// // Route::group(['middleware'=>['Login']],function(){
//         //退出登录
//         Route::any('/login/login_out','login\LoginController@login_out');

//         //Admin_index
// 		Route::any('/admin/index','admin\AdminController@index');
// 		Route::any('/admin/admin/search','admin\AdminController@search');
// 		Route::any('/admin/update','admin\AdminController@update');
// 		//权限
// 		Route::any('/admin/permission/index','admin\PermissionController@index');
// // });



//电商后台项目
//分类表
//分类添加
 Route::any('/admin/sort/SortAdd','admin\SortController@SortAdd');
//分类执行添加
Route::any('/admin/sort/SortAdd_do','admin\SortController@SortAdd_do');
//分类展示
Route::any('/admin/sort/SortList','admin\SortController@SortList');
//分类删除
Route::any('/admin/sort/SortDel','admin\SortController@SortDel');
//分类修改
Route::any('/admin/sort/SortUpdate','admin\SortController@SortUpdate');
//分类执行修改
Route::any('/admin/sort/SortUpdate_do','admin\SortController@SortUpdate_do');
//品牌表
//品牌添加
Route::any('/admin/brands/BrandAdd','admin\BrandController@BrandAdd');
//品牌执行添加
Route::any('/admin/brands/BrandAdd_do','admin\BrandController@BrandAdd_do');
//品牌展示
Route::any('/admin/brands/BrandList','admin\BrandController@BrandList');
//品牌删除
Route::any('/admin/brands/BrandDel','admin\BrandController@BrandDel');
//品牌修改
Route::any('/admin/brands/BrandUpdate','admin\BrandController@BrandUpdate');
//品牌执行修改
Route::any('/admin/brands/BrandUpdate_do','admin\BrandController@BrandUpdate_do');
// 商品表
//商品添加
Route::any('/admin/goods/GoodsAdd','admin\GoodsController@GoodsAdd');
//商品执行添加
Route::any('/admin/goods/GoodsAdd_do','admin\GoodsController@GoodsAdd_do');
//商品展示
Route::any('/admin/goods/GoodsList','admin\GoodsController@GoodsList');
//商品删除
Route::any('/admin/goods/GoodsDel','admin\GoodsController@GoodsDel');
//商品修改
Route::any('/admin/goods/GoodsUpdate','admin\GoodsController@GoodsUpdate');
//商品执行修改
Route::any('/admin/goods/GoodsUpdate_do','admin\GoodsController@GoodsUpdate_do');




