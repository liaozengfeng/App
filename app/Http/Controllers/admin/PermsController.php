<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermsModel;
class PermsController extends Controller
{
   	public function PermsAdd(Request $request){
   		return view('admin.perms.PermsAdd');
   	}

   	public function PermsAdd_do(Request $request){
   		$data=$request->all();
   		$re=PermsModel::create($data);
    		if ($re) {
		   			return $resd=['font'=>'添加成功','code'=>1];
		   	}else{
		   			return $resd=['font'=>'添加失败','code'=>2];
		   	 }
		   	return json_encode($resd);
   	}

   	public function PermsList(Request $request){
   		$data=$request->all();
   		$re=PermsModel::paginate(3);
   		return view('admin.perms.PermsList',['re'=>$re]);
   	}

   	 public function PermsDel(Request $request){
   		$data=$request->all();
   		$res=PermsModel::where(['per_id'=>$data['per_id']])->delete();
   		if ($res) {
   			echo 1;
   		}else{
   			echo 2;
   		}

   }
}
