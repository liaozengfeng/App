<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\RoleModel;
use App\Models\RelevancesModel;
class RelevancesController extends Controller
{
    public function RelevanAdd(){
    	$res=AdminModel::all();
    	$info=RoleModel::all();
    	return view('admin.relevances.RelevanAdd',['res'=>$res],['info'=>$info]);
    }

    public function RelevanAdd_do(Request $request){
    	$data=$request->all();
    	$res=RelevancesModel::create($data);
    	 if ($res) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);
    }

    public function RelevanList(Request $request){
    	$data=$request->all();
    	$res=RelevancesModel::join('admin','relevances.admin_id','=','admin.admin_id')
    	->join('roles','relevances.roles_id','=','roles.roles_id')->paginate(3);
    	return view('admin.relevances.RelevanList',['res'=>$res]);
    }

    public function RelevanUpdate(Request $request){
    	$data=$request->all();
    	$res=RelevancesModel::join('admin','relevances.admin_id','=','admin.admin_id')
    	->join('roles','relevances.roles_id','=','roles.roles_id')->where('admin.admin_id',$data['admin_id'])->first()->toArray();
    	$info=RoleModel::all();
    	return view('admin.relevances.RelevanUpdate',['res'=>$res,'info'=>$info]);
    	
    }

    public function RelevanUpdate_do(Request $request){
    	$data=$request->all();
    	$res=RelevancesModel::where(['admin_id'=>$data['admin_id']])->update(['roles_id'=>$data['roles_id']]);
    	if ($res) {
   			return $resd=['font'=>'修改成功','code'=>1];
   		}else{
   			return $resd=['font'=>'修改失败','code'=>2];
   		}
   		return json_encode($resd);
    }
}
