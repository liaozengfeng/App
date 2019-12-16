<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SortModel;

class SortController extends Controller
{
	//分类表
	//添加
    public function SortAdd(){
    	$sortData=SortModel::all();
    	$sortData=createTree($sortData);
    	return view('admin.sort.SortAdd',['sortData'=>$sortData]);
    }

    // 执行添加
    public function SortAdd_do(Request $request){
    	$data=$request->all();
    	$re=SortModel::create($data);
    	if ($re) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);
    }

    //列表
    public function SortList(Request $request){
    	$data=$request->all();
    	$res=SortModel::all();
    	$res=createTree($res);
    	return view('admin.sort.SortList',['res'=>$res]);
    }

}
