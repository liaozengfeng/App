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
        $where=[];
        if (!empty($data['goods_name'])) {
            $where[]=["goods_name","like","%".$data['goods_name']."%"];
        }

        if (!empty($data['brand_name'])) {
            $where[]=["brand_name","like","%".$data['brand_name']."%"];
        }

        if (!empty($data['is_up'])) {
            $where[]=['is_up','=',$data['is_up']];
        }

        if (!empty($data['order'])) {
            $order=$data['order']." ".$data['order_do'];
        }else{
            $order="goods_id";
        }


    	$res=GoodsModel::where($where)->orderByRaw($order)->join('brands','goods.brand_id','=','brands.brand_id')->join('sorts','goods.sort_id','=','sorts.sort_id')->paginate(3);
    	return view('admin.goods.GoodsList',['res'=>$res]);
    	// 
    	
    }

     public function GoodsDel(Request $request){
        $data=$request->all();
        $res=GoodsModel::where(['goods_id'=>$data['goods_id']])->delete();
        if ($res) {
            echo 1;
        }else{
            echo 2;
        }

   }

   public function GoodsUpdate(Request $request){
        $data=$request->all();
        $res=GoodsModel::join('brands','goods.brand_id','=','brands.brand_id')->join('sorts','goods.sort_id','=','sorts.sort_id')->where(['goods_id'=>$data['goods_id']])->first();
        return view('admin.goods.GoodsUpdate',['res'=>$res]);

   }

   public function GoodsUpdate_do(Request $request){
        $data=$request->all();
        $res=GoodsModel::where(['goods_id'=>$data['goods_id']])->update([
                'goods_name'=>$data['goods_name'],
                'goods_stock'=>$data['goods_stock'],
                'goods_desc'=>$data['goods_desc'],
                'goods_pirce'=>$data['goods_pirce'],
                'is_up'=>$data['is_up'],
                'is_sale'=>$data['is_sale'],
                'is_new'=>$data['is_new'],

            ]);
        if ($res) {
            return $resd=['font'=>'修改成功','code'=>1];
        }else{
            return $resd=['font'=>'修改失败','code'=>2];
        }
        return json_encode($resd);

   }

   // 既点既改
   public function GoodsThat(Request $request){
        $data=$request->all();
        $res=GoodsModel::where(['goods_id'=>$data['goods_id']])->update($data);
        if ($res) {
            echo 1;
        }else{
            echo 2;
        }

   }


}
