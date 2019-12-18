<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AttrvalModel;
use Illuminate\Http\Request;
use App\Models\SortModel;
use App\Models\AttrModel;
use App\Models\GoodsModel;
use App\Models\AttrjsongoodsModel;
use \DB;
class AttrController extends Controller
{
    public function type(Request $request){
        if ($request->isMethod("POST")) {
            $data=$request->all();
            $res=AttrModel::create($data);
            if ($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $sort_id = $request->input("sort_id");
            $sort_info = SortModel::where("sort_id", $sort_id)->first(['sort_name', 'sort_id'])->toArray();
            return view('admin/attr/save', ['sort_info' => $sort_info]);
        }
    }
    public function attrsave(Request $request){
        if ($request->isMethod("POST")) {
            $data=$request->all();
            $arrt_val_id=\DB::table('attr_val')->insertGetId(['attr_val'=>$data['attr_val']]);
            $res=AttrjsongoodsModel::create(['goods_id'=>$data['goods_id'],'attr_id'=>$data['attr_id'],"attr_val_id"=>$arrt_val_id]);
            if ($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $sort_id = $request->input("sort_id");
            $goods_id = $request->input("goods_id");
            $sort_name = SortModel::where("sort_id", $sort_id)->first(['sort_name'])->toArray();
            $attr_info=AttrModel::where('sort_id',$sort_id)->get()->toArray();
            $goods_info = GoodsModel::where("goods_id", $goods_id)->first(['goods_name','goods_id'])->toArray();
            return view('admin/goods/attrsave', ['sort_name' => $sort_name,'goods_info'=>$goods_info,"attr_info"=>$attr_info]);
        }
    }

    public function list(Request $request){
        $sort_id = $request->input("sort_id");
        $attr_info=AttrModel::where("sort_id",$sort_id)->get()->toArray();
        $sort_name = SortModel::where("sort_id", $sort_id)->first(['sort_name'])->toArray();
        return view('admin/attr/sortlist',['attr_info'=>$attr_info,'sort_name'=>$sort_name]);
    }

    public function attrlist(Request $request){
        $goods_id = $request->input("goods_id");
        $attrinfo=AttrjsongoodsModel::where("goods_id",$goods_id)->get()->toArray();
        foreach ($attrinfo as $k=>$v){
            $attrinfo[$k]['attr_val']=AttrvalModel::where("attr_val_id",$v['attr_val_id'])->get()->toArray();
            $attrinfo[$k]['attr']=AttrModel::where("attr_id",$v['attr_id'])->get(['attr_name'])->toArray();
        }
        dd($attrinfo);
        return view('admin/goods/attrlist',['attrinfo'=>$attrinfo]);
    }
}
