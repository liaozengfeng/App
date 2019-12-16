<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Storage;

class BrandController extends Controller
{
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
			$res=BrandModel::all();
			return view('admin.brands.BrandList',['res'=>$res]);
	}

}
