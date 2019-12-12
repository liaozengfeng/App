<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamModel;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(Request $request){
        $data=curl_get("http://api.avatardata.cn/ActNews/Query?key=844c595663c8488e86b3f600dcfa12e2&keyword=奥巴马");
        $data=json_decode($data,1);
        $res=[];
        foreach ($data['result'] as $k=>$v){
            $arr['pdate']=$v['pdate'];
            $arr['title']=$v['title'];
            $arr['content']=$v['content'];
            $arr['img']=$v['img'];
            $res[]=ExamModel::create($arr);
        }
        return redirect("/list");
    }

    public function list(Request $request){
        ob_start();
        if (file_exists("./html/list.html")) {
            echo file_get_contents("./html/list.html");
        }else{
            $info=ExamModel::paginate(5);
            echo  view("admin.exam.list",['info'=>$info]);
            $content=ob_get_contents();
            $res=file_put_contents("./html/list.html",$content);
        }
    }

    public function info(Request $request){
        $redis=new \Redis();
        $redis->connect("127.0.0.1");
        ob_start();
        $id=$request->input("id");
        if (!empty($redis->get("info_".$id))) {
            echo $redis->get("info_".$id);
        }else{
            $info=ExamModel::where("id",$id)->first()->toArray();
            echo  view("admin.exam.info",['info'=>$info]);
            $content=ob_get_contents();
            $redis->set("info_".$id,$content,2*60);
        }

    }
}
