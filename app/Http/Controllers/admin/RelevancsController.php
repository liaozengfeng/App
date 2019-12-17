<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermsModel;
use App\Models\RoleModel;
use App\Models\RelevancsModel;

class RelevancsController extends Controller
{
    public function ReleAdd(Request $request){
    	$res=PermsModel::all();
    	$info=RoleModel::all();
    	return view('admin.relevancs.ReleAdd',['res'=>$res],['info'=>$info]);
    }

    public function ReleAdd_do(Request $request){
    	$data=$request->all();
    	$res=RelevancsModel::create($data);
    	 if ($res) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);
    }

        public function ReleList(Request $request){
    	$data=$request->all();
    	$res=RelevancsModel::join('perms','relevancs.per_id','=','perms.per_id')
    	->join('roles','relevancs.roles_id','=','roles.roles_id')->paginate(3);
    	return view('admin.relevancs.ReleList',['res'=>$res]);
    }
}
