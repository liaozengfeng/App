<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoodsModel;
use App\Models\BrandModel;
use App\Models\SortModel;
use Storage;
class GoodsController extends Controller
{
    public function GoodsAdd(){
    	$res=BrandModel::all();
    	$info=SortModel::all();
    	$info=createTree($info);
    	return view('admin.goods.GoodsAdd',['res'=>$res],['info'=>$info]);
    }

    public function GoodsAdd_do(Request $request){
    	$data=$request->all();
    	$path='';
        if ($request->hasFile('goods_img') && $request->file('goods_img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('goods_img'));
            }
           
            $data['goods_img']=$path;
    		$res=GoodsModel::create($data);
    	if ($res) {
   			return $resd=['font'=>'添加成功','code'=>1];
   		}else{
   			return $resd=['font'=>'添加失败','code'=>2];
   		}
   		return json_encode($resd);
    }

    public function GoodsList(Request $request){
    	$data=$request->all();
    	$res=GoodsModel::join('brands','goods.brand_id','=','brands.brand_id')->join('sorts','goods.sort_id','=','sorts.sort_id')->paginate(3);
    	return view('admin.goods.GoodsList',['res'=>$res]);
    	// 
    	
    }
}
