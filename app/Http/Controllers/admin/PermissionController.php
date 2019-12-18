<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\Db;
use Storage;
class PermissionController extends Controller
{
    public function index()
    {
        $info=PermissionModel::all()->toArray();
        return view("admin/permission/index",['data'=>$info]);
    }
    //广告添加
    public function wides(Request $request){
        return view('admin.wides.wides');
    }
    //广告添加执行页面
        public function wides_list(Request $request){
            $data=$request->all();
            // dd($data);
            $path='';
        if ($request->hasFile('wide_img') && $request->file('wide_img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('wide_img'));
            }

            $data['wide_img']=$path;
            $res=Db::table('wides')->insert($data);
            if($res){
                $arr=[
                    'err'=>1,
                    'msg'=>'添加成功',
                ];
                die(json_encode($arr,JSON_UNESCAPED_UNICODE));
            }else{
                $arr=[
                    'err'=>2,
                    'msg'=>'添加失败',

                ];
                die(json_encode($arr,JSON_UNESCAPED_UNICODE));
            }
    }
     //广告展示
        public function wides_line(Request $request){
        $data=$request->all();
        // dd($data);
        $res=Db::table('wides')->get();
        // dd($res);
         return view("admin.wides.wides_line",['res'=>$res]);

    }


             // 广告删除

            public function wides_delete(Request $request)
            {
                $data=$request->all();
                $res=Db::table('wides')->where(['wide_id'=>$data['wide_id']])->delete();
                if($res){
                    return 1;
                }else{
                    return 2;
                }
            }

}