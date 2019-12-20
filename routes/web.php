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
        Route::any('/login/login','login\LoginController@login');
        //注册
        Route::any('/login/register','login\LoginController@register');
        //考试
        Route::any('/exam','admin\ExamController@index');
        Route::any('/list','admin\ExamController@list');
        Route::any('/info','admin\ExamController@info');


// Route::group(['middleware'=>['Login']],function(){
        //退出登录
        Route::any('/login/login_out','login\LoginController@login_out');

        //Admin_index
		Route::any('/admin/index','admin\AdminController@index');
		Route::any('/admin/admin/search','admin\AdminController@search');
		Route::any('/admin/update','admin\AdminController@update');
		//权限
		Route::any('/admin/permission/index','admin\PermissionController@index');
// });
 // Route::any('/layouts/layouts','layouts\PermissionController@layouts');
//广告添加
Route::any('/wides/wides','admin\PermissionController@wides');
//添加执行
Route::any('/wides/wides_list','admin\PermissionController@wides_list');
//广告展示
Route::any('/wides/wides_line','admin\PermissionController@wides_line');
//广告删除
Route::any('/wides/wides_delete','admin\PermissionController@wides_delete');
//广告修改
// 登陆注册
// 注册
Route::any('/login/Reg','login\AdminController@Reg');
// 执行注册
Route::any('/login/Reg_do','login\AdminController@Reg_do');
// 唯一性
Route::any('/login/Weiyi','login\AdminController@Weiyi');
// 登陆
Route::any('/login/Logins','login\AdminController@Logins');
//执行登陆
Route::any('/login/Logins_do','login\AdminController@Logins_do');

//分类类型
Route::any('/admin/attr/type','admin\AttrController@type');
//分类类型展示
Route::any('/admin/attr/list','admin\AttrController@list');
//商品属性添加
Route::any('/admin/goods/attrsave','admin\AttrController@attrsave');
//商品属性展示
Route::any('/admin/goods/attrlist','admin\AttrController@attrlist');


Route::group(['middleware'=>['Login']],function(){
// 退出登陆
 Route::any('/login/login_out','login\AdminController@login_out');


//电商后台项目
//首页
 Route::any('/layouts/layouts','admin\BrandController@layouts');
//分类表
//分类添加
 Route::any('/admin/sort/SortAdd','admin\SortController@SortAdd');
//分类执行添加
Route::any('/admin/sort/SortAdd_do','admin\SortController@SortAdd_do');
//分类展示
Route::any('/admin/sort/SortList','admin\SortController@SortList');
//分类删除
Route::any('/admin/sort/SortDel','admin\SortController@SortDel');
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
// 轮播图表
// 轮播图添加
Route::any('/admin/gures/GureAdd','admin\GureController@GureAdd');
//轮播图添加
Route::any('/admin/gures/GureAdd_do','admin\GureController@GureAdd_do');
//轮播图展示
Route::any('/admin/gures/GureList','admin\GureController@GureList');
//轮播图删除
Route::any('/admin/gures/GureDel','admin\GureController@GureDel');
// 商品图片表
//商品图片添加
Route::any('/admin/img/ImgAdd','admin\ImgController@ImgAdd');
//商品图片执行添加
Route::any('/admin/img/ImgAdd_do','admin\ImgController@ImgAdd_do');
//商品图片展示
Route::any('/admin/img/ImgList','admin\ImgController@ImgList');
//商品图片删除
Route::any('/admin/img/ImgDel','admin\ImgController@ImgDel');
// rbac
// 角色表
// 角色添加
Route::any('/admin/roles/RoleAdd','admin\RoleController@RoleAdd');
// 角色执行添加
Route::any('/admin/roles/RoleAdd_do','admin\RoleController@RoleAdd_do');
// 角色展示
Route::any('/admin/roles/RoleList','admin\RoleController@RoleList');
// 角色删除
Route::any('/admin/roles/RoleDel','admin\RoleController@RoleDel');
// 用户角色关联表
// 用户角色关联添加
Route::any('/admin/relevances/RelevanAdd','admin\RelevancesController@RelevanAdd');
// 用户角色关联执行添加
Route::any('/admin/relevances/RelevanAdd_do','admin\RelevancesController@RelevanAdd_do');
// 用户角色关联展示
Route::any('/admin/relevances/RelevanList','admin\RelevancesController@RelevanList');
// 用户角色关联修改
Route::any('/admin/relevances/RelevanUpdate','admin\RelevancesController@RelevanUpdate');
// 用户角色关联执行修改
Route::any('/admin/relevances/RelevanUpdate_do','admin\RelevancesController@RelevanUpdate_do');
// 权重表
// 权重添加
Route::any('/admin/perms/PermsAdd','admin\PermsController@PermsAdd');
// 权重执行添加
Route::any('/admin/perms/PermsAdd_do','admin\PermsController@PermsAdd_do');
// 权重展示
Route::any('/admin/perms/PermsList','admin\PermsController@PermsList');
// 权重删除
Route::any('/admin/perms/PermsDel','admin\PermsController@PermsDel');
// 权重角色关联表
// 权重角色关联添加
Route::any('/admin/relevancs/ReleAdd','admin\RelevancsController@ReleAdd');
// 权重角色关联执行添加
Route::any('/admin/relevancs/ReleAdd_do','admin\RelevancsController@ReleAdd_do');
// 权重角色关联展示
Route::any('/admin/relevancs/ReleList','admin\RelevancsController@ReleList');
});
