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
      $where=[];
      if (!empty($data['sort_name'])) {
          $where[]=["sort_name","like","%".$data['sort_name']."%"];
        }

      if (!empty($data['is_show'])) {
          $where[]=['is_show','=',$data['is_show']];
        }

      if (!empty($data['order'])) {
          $order=$data['order']." ".$data['order_do'];
         }else{
          $order="sort_id";
        }   
    	$res=SortModel::where($where)->orderByRaw($order)->get();
    	$res=createTree($res);
    	return view('admin.sort.SortList',['res'=>$res]);
    }

     public function SortDel(Request $request){
      $data=$request->all();
      $res=SortModel::where(['sort_id'=>$data['sort_id']])->delete();
      if ($res) {
        echo 1;
      }else{
        echo 2;
      }

   }

   public function SortUpdate(Request $request){
      $data=$request->all();
      $res=SortModel::where(['sort_id'=>$data['sort_id']])->first();
      $info=SortModel::all();
      $info=createTree($info);
      return view('admin.sort.SortUpdate',['res'=>$res],['info'=>$info]);

   }

    // 既点既改
   public function SortThat(Request $request){
      $data=$request->all();
      $res=SortModel::where(['sort_id'=>$data['sort_id']])->update($data);
      if ($res) {
            echo 1;
      }else{
            echo 2;
      }
   }

}
