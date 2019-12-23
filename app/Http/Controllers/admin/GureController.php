<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GureModel;
use Storage;
class GureController extends Controller
{
    //轮播图添加
    public function GureAdd(){
    	return view('admin.gures.GureAdd');
    }

    public function GureAdd_do(Request $request){
    	$data=$request->all();
    	$path='';
        if ($request->hasFile('gure_img') && $request->file('gure_img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('gure_img'));
            }
           
            $data['gure_img']=$path;

	    	$res=GureModel::create($data);
	    	if ($res) {
	   			return $resd=['font'=>'添加成功','code'=>1];
	   		}else{
	   			return $resd=['font'=>'添加失败','code'=>2];
	   		}
	   		return json_encode($resd);
    }

    public function GureList(Request $request){
    	$data=$request->all();
    	$res=GureModel::paginate(3);
    	return view('admin.gures.GuresList',['res'=>$res]);
    }


     public function GureDel(Request $request){
        $data=$request->all();
        $res=GureModel::where(['gure_id'=>$data['gure_id']])->delete();
        if ($res) {
            echo 1;
        }else{
            echo 2;
        }

   }
}
