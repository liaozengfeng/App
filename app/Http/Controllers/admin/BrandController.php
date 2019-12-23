<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Storage;

class BrandController extends Controller
{

    public function layouts(){
        return view('layouts.layouts');
    }

    public function BrandAdd(){
    	return view('admin.brands.BrandAdd');
    }

    public function BrandAdd_do(Request $request){
    	$data=$request->all();
    	  $path='';
            if ($request->hasFile('brand_img') && $request->file('brand_img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('brand_img'));
            }
           
            $data['brand_img']=$path;
    		$re=BrandModel::create($data);
    		if ($re) {
		   			return $resd=['font'=>'添加成功','code'=>1];
		   	}else{
		   			return $resd=['font'=>'添加失败','code'=>2];
		   	 }
		   	return json_encode($resd);
		  }

	public function BrandList(Request $request){
			$data=$request->all();
            $where=[];
            if (!empty($data['brand_name'])) {
                $where[]=["brand_name","like","%".$data['brand_name']."%"];
            }

            if (!empty($data['is_show'])) {
                $where[]=['is_show','=',$data['is_show']];
            }

            if (!empty($data['order'])) {
                $order=$data['order']." ".$data['order_do'];
            }else{
                $order="brand_id";
            }
			$res=BrandModel::where($where)->orderByRaw($order)->paginate(3);
			return view('admin.brands.BrandList',['res'=>$res]);
	}

     public function BrandDel(Request $request){
        $data=$request->all();
        $res=BrandModel::where(['brand_id'=>$data['brand_id']])->delete();
        if ($res) {
            echo 1;
        }else{
            echo 2;
        }

   }

   public function brandUpdate(Request $request){
        $data=$request->all();
        $info=BrandModel::where(['brand_id'=>$data['brand_id']])->first();
        return view("admin.brands.brandUpdate",['info'=>$info]);
   }

   public function brandUpdate_do(Request $request){
       $data=$request->all();
        $res=BrandModel::where(['brand_id'=>$data['brand_id']])->update([
                'brand_name'=>$data['brand_name'],
                'brand_url'=>$data['brand_url'],
                'is_show'=>$data['is_show'],
            ]);
            if ($res) {
                    return $resd=['font'=>'修改成功','code'=>1];
            }else{
                    return $resd=['font'=>'修改失败','code'=>2];
             }
            return json_encode($resd);

   }

    // 既点既改
   public function BrandThat(Request $request){
        $data=$request->all();
        $res=BrandModel::where(['brand_id'=>$data['brand_id']])->update($data);
        if ($res) {
            echo 1;
        }else{
            echo 2;
        }


   }

}
