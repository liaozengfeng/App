<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    //注册
    public function Reg(){
    	return view('login.Reg');
    }

    public function Reg_do(Request $request){
    	$data=$request->all();
    	$res=AdminModel::create($data);
    	if ($res) {
			$arr=[
				'error'=>1,
				'msg'=>'注册成功'
			];

			return json_encode($arr);
		}else{
			$arr=[
				'error'=>2,
				'msg'=>'注册失败'
			];
			return json_encode($arr);
		}

    }

    // 判断唯一性
    public function Weiyi(Request $request){
    	$admin_name=$request->input('admin_name');
    	$res=AdminModel::where(['admin_name'=>$admin_name])->first();
    	if ($res) {
			$arr=[
				'error'=>1,
				'msg'=>'用户名已存在'
			];

			return json_encode($arr);

		}else{
			$arr=[
				'error'=>2,
				'msg'=>'用户名可注册'
			];

			return json_encode($arr);
		}
    }

    // 登陆
    public function Logins(Request $request){
    	return view('login.Logins');
    }

    public function Logins_do(Request $request){
    	$data=$request->all();
    	$where[]=[
    		'admin_name','=',$data['admin_name'],
    	];
    	$info=AdminModel::where($where)->first();
    	if (time()-$info['error_time']<60) {
    		$time=60-(time()-$info['error_time']);
    		return json_encode(['find'=>'账号已锁定到'.date("Y-m-d H:i:s",$info['error_time']),'msg'=>1]);
    	}
    	if ($info) {
    		if ($info['admin_pwd']==$data['admin_pwd']) {
    			AdminModel::where(['admin_id'=>$info['admin_id']])->update(['error_num'=>0,'error_time'=>0]);
    			$request->session()->put('all', $info);
    			return json_encode(['find'=>'登陆成功','msg'=>3]);
    		}else{
    			$error_num=$info['error_num'];
    			if ($error_num>=2) {
    				AdminModel::where(['admin_id'=>$info['admin_id']])->update(['error_num'=>0,'error_time'=>time()]);
    				return json_encode(['find'=>'密码错误,3次将锁定账号','msg'=>4]);
    			}else{
    				$error=$error_num+1;
    				$num=3-$error;
    				AdminModel::where(['admin_id'=>$info['admin_id']])->update(['error_num'=>$error]);
    				return json_encode(['find'=>'密码错误,还有'.$num.'次机会','msg'=>5]);
    			}
    		}
    	}else{
    		return json_encode(['find'=>'账号未注册','msg'=>2]);
    	}

    }

    // 退出登陆
    public function login_out(Request $request){
    	session(['all'=>null]);
    	 echo '<script>alert("Exit the success!!!"); location.href="/login/Logins"</script>';
    }
}
