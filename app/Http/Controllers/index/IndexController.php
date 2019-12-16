<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AreaModel;
use App\Models\GoodsModel;
use App\Models\AddressModel;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    //三级联动
   public function index(Request $request){
       $pid=empty($request->input("pid"))?0:$request->input("pid");
       $data=AreaModel::where('pid',$pid)->get()->toArray();
       echo json_encode($data,1);
   }
   //收货地址展示
    public function order(Request $request){
        $data=AddressModel::all()->toArray();
        foreach ($data as $k=>$v){
            $province=AreaModel::where("id",$v['province'])->get(['name']);
            $district=AreaModel::where("id",$v['district'])->get(['name']);
            $city=AreaModel::where("id",$v['city'])->get(['name']);
            $data[$k]['city']=$city;
            $data[$k]['province']=$province;
            $data[$k]['district']=$district;
        }
        echo json_encode($data,1);
    }

    //商品展示
    public function goodslist(Request $request){
        $data=GoodsModel::get();
        echo json_encode($data,1);
    }
    //购物车展示
    public function cardlist(Request $request){

    }
    
    public static function cart_recursion($data,$parent_id=0){
        $arr=[];
        foreach ($data as $k=>$v) {
            if ($v->parent_id == $parent_id) {
                $son=self::info($data,$v->sort_id);
                $v['son']=$son;
                $arr[$k]=$v;
            }
        }
        return $arr;
    }
}
