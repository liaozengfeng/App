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








