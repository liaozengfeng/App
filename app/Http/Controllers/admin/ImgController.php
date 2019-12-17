<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoodsModel;
use App\Models\ImgModel;
use Storage;
class ImgController extends Controller
{
    public function ImgAdd(Request $request){
    	$info=GoodsModel::all();
    	return view('admin.img.ImgAdd',['info'=>$info]);
    }

    public function ImgAdd_do(Request $request){
    	$data=$request->all();
    	$path='';
        if ($request->hasFile('goodss_img') && $request->file('goodss_img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('goodss_img'));
            }
           
            $data['goodss_img']=$path;
            $res=ImgModel::create($data);
    	if ($res) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);
    }

    public function ImgList(Request $request){
    	$data=$request->all();
    	$res=ImgModel::join('goods','img.goods_id','=','goods.goods_id')->paginate(3);
    	return view('admin.img.ImgList',['res'=>$res]);
    }
}
