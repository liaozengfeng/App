<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
class RoleController extends Controller
{
   public function RoleAdd(){
   		return view('admin.roles.RoleAdd');
   }

   public function RoleAdd_do(Request $request){
   		$data=$request->all();
   		$res=RoleModel::create($data);
   		if ($res) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);

   }

   public function RoleList(Request $request){
   		$data=$request->all();
   		$res=RoleModel::all();
   		return view('admin.roles.RoleList',['res'=>$res]);

   }

   public function RoleDel(Request $request){
   		$data=$request->all();
   		$res=RoleModel::where(['roles_id'=>$data['roles_id']])->delete();
   		if ($res) {
   			echo 1;
   		}else{
   			echo 2;
   		}

   }

}
