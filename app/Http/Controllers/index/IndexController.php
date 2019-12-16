<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\PermissionModel;
use App\Models\RelationModel;
use App\Models\AddressModel;
use App\Models\TrolleyModel;
use App\Models\ShopModel;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    //三级联动
   public function index(Request $request){
       $pid=empty($request->input("pid"))?0:$request->input("pid");
       $data=AreaModel::where('pid',$pid)->get()->toArray();
       echo json_encode($data,1);
   }
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
}
