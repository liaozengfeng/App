<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\AreaModel;
use App\Models\BrowseModel;
use App\Models\CatModel;
use App\Models\CollectModel;
use App\Models\GoodsModel;
use App\Models\GuresModel;
use App\Models\ImgModel;
use App\Models\AddressModel;
use App\Models\OrderinfoModel;
use App\Models\OrdershopModel;
use App\Models\SortModel;
use Illuminate\Http\Request;
use App\Models\AttrModel;
use App\Models\UserModel;
use App\Models\AttrvalModel;
use App\Models\AttrjsongoodsModel;
use \DB;
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
        $data=AddressModel::where('user_id',$request->input('user_id'))->get()->toArray();
        foreach ($data as $k=>$v){
            $province=AreaModel::where("id",$v['province'])->get(['name']);
            $district=AreaModel::where("id",$v['county'])->get(['name']);
            $city=AreaModel::where("id",$v['city'])->get(['name']);
            $data[$k]['city']=$city;
            $data[$k]['province']=$province;
            $data[$k]['county']=$district;
        }
        echo json_encode($data,1);
    }

    //商品展示
    public function goodslist(Request $request){
        if (empty($request->input('sort_id'))){
            $data=GoodsModel::get(['goods_id','goods_name','goods_img','goods_pirce']);
        }else{
            $data=GoodsModel::where("sort_id",$request->input('sort_id'))->get(['goods_id','goods_name','goods_img','goods_pirce']);
        }
        echo json_encode($data,1);
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
        $data=GoodsModel::where('goods_id',$request->input("goods_id"))->first(['goods_id',"goods_img",'goods_desc','goods_pirce','hits'])->toArray();
        $data['goods_imgs']=ImgModel::where('goods_id',$data['goods_id'])->get(['goodss_img'])->toArray();
        $browse=["goods_id"=>$request->input("goods_id"),'user_id'=>$request->input('user_id'),"br_time"=>time()];
        $res=BrowseModel::create($browse);
        GoodsModel::where('goods_id',$data['goods_id'])->update(['hist'=>$data['hits']+1]);
        $info=AttrjsongoodsModel::where('goods_id',$request->input("goods_id"))->get()->toArray();
        $attr_id=[];
        $attr_val_id=[];
        $array=[];
        foreach ($info as $k=>$v){
            $attr_id[]=$v['attr_id'];
            $attr_val_id[]=$v['attr_val_id'];
            $aa=AttrvalModel::where("attr_val_id",$v['attr_val_id'])->first()->toArray();
            $aa['attr_id']=$v['attr_id'];
            $array[]=$aa;
        }
        $attr_id=array_unique($attr_id);
        $attr=[];
        foreach ($attr_id as $k=>$v){
            $attr[]=AttrModel::where("attr_id",$v)->first()->toArray();
        }
        foreach ($attr as $ke=>$va){
            foreach($array as $k=>$v){
                if ($va['attr_id']==$v['attr_id']){
                    $attr[$ke]['son'][]=$v;
                }
            }
        }
        $data['attr']=$attr;
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
        $data['attr_val_id']=implode(",",$data['attr_val_id']);
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
    //注册
    public function regist(Request $request)
    {
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $user_pwd = md5($request->input('user_pwd'));
        $user_phone = $request->input('user_phone');
        if(empty($user_name)||empty($user_pwd)||empty($user_phone)){
            echo json_encode(['res'=>201,'msg'=>'数据不能为空']);
        }
        $data = DB::table('user')->insertGetId([
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_pwd'=>$user_pwd,
            'user_phone'=>$user_phone
        ]);
        if($data){
            return json_encode(['res'=>200,'msg'=>'添加成功','user_id'=>$data],1);
        }else{
            return json_encode(['res'=>201,'msg'=>'添加失败'],1);
        }
    }
    //登入
    public function login(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_pwd = $request->input('user_pwd');
        $userData =UserModel::where(['user_name'=>$user_name,'user_pwd'=>md5($user_pwd)])->first();
        if(!$userData){
            return json_encode(['ret'=>2,'msg'=>'登录失败']);
        }
        return json_encode(['ret'=>1,'msg'=>'登录成功','user_id'=>$userData['user_id']]);
    }

    //购物车展示
    public function catlist(Request $request){
       $data=[];
        $user_id=$request->input("user_id");
        $info=CatModel::join("goods",'goods.goods_id',"=","cat.goods_id")->where('user_id',$user_id)->orderBy("add_time",'asc')->get()->toArray();
        foreach($info as $k=>$v){
            $info[$k]['attr_val_id']=explode(",",$v['attr_val_id']);
            foreach ($info[$k]['attr_val_id'] as $ke=>$va){
                $info[$k]['attr_val_id'][$ke]=AttrjsongoodsModel::join('attr_val','attr_val.attr_val_id',"=","attr_join_goods.attr_val_id")->join('attr','attr.attr_id',"=","attr_join_goods.attr_id")->where("attr_join_goods.attr_val_id",$va)->get(['attr_val.attr_val_id','attr.attr_id','attr.attr_name','attr_val.attr_val'])->toArray();
            }
        }
        echo json_encode($info,1);
   }

   //购物车商品数量修改
   public function num(Request $request){
       $data=$request->all();
       $res=CatModel::where(["user_id"=>$data['user_id'],"goods_id"=>$data['goods_id']])->update($data);
       if ($res){
           return json_encode(['res'=>1],1);
       }else{
           return json_encode(['res'=>2],1);
       }
   }
    public function goodsorder(Request $request){
       $data = GoodsModel::orderBy($request->input("order"), 'desc')->get()->toArray();
        echo json_encode($data,1);
    }


    public function ordersave(Request $request){
        $cat_id=$request->input('cat_id');
        $user_id=$request->input('user_id');
        $shopinfo['user_id']=$data['user_id']=$user_id;
        $data['address_id']=$request->input('address_id');
        $data['pay_time']=time();
        $data['order_sn']=date("YmdHi",time()).rand(9999,1000);
        $cat_id=explode(",",$cat_id);
        $info=CatModel::join("goods","goods.goods_id","=","cat.goods_id")->whereIn('cat_id',$cat_id)->get(['cat.goods_id','cat.goods_num','goods.goods_pirce','attr_val_id'])->toArray();
        $shop_info=[];
        $money=0;
        foreach($info as $k=>$v){
           $money+=$v['goods_num']*$v['goods_pirce'];
           $shopinfo['goods_id']=$v['goods_id'];
           $shopinfo['goods_num']=$v['goods_num'];
           $shopinfo['attr_val_id']=$v['attr_val_id'];
           $shopinfo['goods_price']=$v['goods_pirce'];
           $shop_info[]=$shopinfo;
        }
        $data['money']=$money;
        $order_id=\DB::table('order_info')->insertGetId($data);
        foreach($shop_info as $k=>$v){
           $shop_info[$k]['order_id']=$order_id;
        }
        foreach ($shop_info as $k=>$v){
            $res=OrdershopModel::create($v);
        }

        if ($res){
            CatModel::whereIn('cat_id',$cat_id)->delete();
           return json_encode(['res'=>1,'msg'=>'订单提交成功']);
        }else{
           return json_encode(['res'=>2,'msg'=>'订单提交失败']);
        }
    }

    //订单商品展示
    public function orderlist(Request $request){
        $cat_id=$request->input('cat_id');
        if (empty($cat_id)){

        }else{
            $cat_id=explode(",",$cat_id);
            $data=CatModel::join("goods","goods.goods_id","=","cat.goods_id")->whereIn('cat_id',$cat_id)->get(['cat.goods_id','cat.goods_num',"goods.goods_name",'goods.goods_pirce','attr_val_id','goods.goods_img'])->toArray();
            return json_encode($data,1);
        }
    }

    public function addresssave(Request $request){
       $data=$request->all();
       $res=AddressModel::where('user_id',$data['user_id'])->update(['is_checked'=>2]);
       if ($res>=0){
           $res=AddressModel::create($data);
           if ($res){
               return json_encode(['res'=>1,"msg"=>'添加成功'],1);
           }
       }
       return json_encode(['res'=>2,"msg"=>'添加失败'],1);
    }

    public function addressdel(Request $request){
        $res=AddressModel::where(['user_id'=>$request->input('user_id'),"address_id"=>$request->input('address_id')])->delete();
        if ($res){
            return json_encode(['res'=>1,"msg"=>'删除成功'],1);
        }else{
            return json_encode(['res'=>2,"msg"=>'删除失败'],1);
        }
    }

    public function addresschecked(Request $request){
        $data=AddressModel::where(['user_id'=>$request->input('user_id'),"is_checked"=>1])->first(['address_id',"consignee",'address','mobile'])->toArray();
        return json_encode($data,1);
    }

    public function order_list(Request $request){
        $order_info=OrderinfoModel::where('user_id',$request->input('user_id'))->get(['order_id','order_sn','order_status','money'])->toArray();
        foreach ($order_info as $k=>$v){
            $order_shop=OrdershopModel::where('order_id',$v['order_id'])->get(['goods_id','goods_num'])->toArray();
            foreach ($order_shop as $ke=>$va){
                $shop=GoodsModel::where('goods_id',$va['goods_id'])->first(['goods_img','goods_pirce','goods_name'])->toArray();
                $shop['goods_num']=$va['goods_num'];
                $order_info[$k]['order_shop'][]=$shop;
            }
        }
        return json_encode($order_info,1);
    }

    //商品收藏
    public function collect_save(Request $request){
        $data=$request->all();
        $data['add_time']=time();
        $num=CollectModel::where(['user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']])->count();
        if ($num<=0){
            $res=CollectModel::create($data);
            if ($res){
                return json_encode(['res'=>1,'msg'=>'收藏成功']);
            }else{
                return json_encode(['res'=>2,'msg'=>'收藏失败']);
            }
        }else{
            return json_encode(['res'=>2,'msg'=>'商品已存在']);
        }
    }

    //用户详情
    public function info(Request $request){
       $data=UserModel::where('user_id',$request->input('user_id'))->first(['user_name'])->toArray();
        return json_encode($data,1);
    }

	//收藏列表
	public function collist(Request $request)
	{
		$add =  $request->input('user_id');
		$data = CollectModel::join('goods','goods.goods_id','=','collect.goods_id')->where('user_id',$add)->get();
		echo json_encode($data,1);
	}
	
	//收货地址默认修改
	public function address_checked(Request $request){
	    $data=$request->all();
        AddressModel::where('user_id',$data['user_id'])->update(['is_checked'=>2]);
        $res=AddressModel::where('address_id',$data['address_id'])->update($data);
        if ($res){
            $arr=['res'=>1];
        }else{
            $arr=['res'=>2];
        }
	    echo json_encode($arr,1);
	}
	
}
