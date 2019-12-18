<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AreaModel;
use App\Models\BrowseModel;
use App\Models\CatModel;
use App\Models\GoodsModel;
use App\Models\GuresModel;
use App\Models\ImgModel;
use App\Models\AddressModel;
use App\Models\SortModel;
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
        $where=empty($request->input("sort_id"))?"":'sort_id = '.$request->input("sort_id");
        if (empty($where)){
            $data=GoodsModel::get(['goods_id','goods_name','goods_img','goods_pirce']);
        }else{
            $data=GoodsModel::whereRaw($where)->get(['goods_id','goods_name','goods_img','goods_pirce']);
        }

        echo json_encode($data,1);
    }
    //购物车展示
    public function cardlist(Request $request){

    }

    //分类展示
    public function sortlist(Request $request){
        $data=SortModel::get();
        $data=self::cart_recursion($data);
        echo json_encode($data,1);
    }

    //递归
    public static function cart_recursion($data,$parent_id=0){
        $arr=[];
        foreach ($data as $k=>$v) {
            if ($v->parent_id == $parent_id) {
                $son=self::cart_recursion($data,$v->sort_id);
                $v['son']=$son;
                $arr[$k]=$v;
            }
        }
        return $arr;
    }

    //首页顶级分类展示
    public function sorttop(Request $request){
        $data=SortModel::where("parent_id",0)->get()->toArray();
        echo json_encode($data,1);
    }

    //商品详情
    public function goodsinfo(Request $request){
        $data=GoodsModel::where('goods_id',$request->input("goods_id"))->first()->toArray();
        $data['goods_imgs']=ImgModel::where('goods_id',$data['goods_id'])->get(['goodss_img'])->toArray();
        $browse=["goods_id"=>$request->input("goods_id"),'user_id'=>$request->input('user_id'),"br_time"=>time()];
        $res=BrowseModel::create($browse);
        echo json_encode($data,1);
    }

    //首页轮播图
    public function gures(Request $request){
       $data=GuresModel::get()->toArray();
        echo json_encode($data,1);
    }

    //加入购物车
    public function car(Request $request){
        $data=$request->all();
        $data['user_id']=1;
        $num=CatModel::where(['user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']])->count();
        if ($num>0){
            return json_encode(['res'=>201,'msg'=>'商品已存在'],1);
        }
        $data['add_time']=time();
        $res=CatModel::create($data);
        if ($res){
            return json_encode(['res'=>200,'msg'=>'成功'],1);
        }else{
            return json_encode(['res'=>201,'msg'=>'失败'],1);
        }
    }
}
