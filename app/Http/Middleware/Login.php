<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\RoleModel;
use App\Models\PermsModel;
class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session("all"))){
            echo '<script>alert("Please login first!!!"); location.href="/login/Logins"</script>';
        }else{
            $url="/".$request->path();
            $info=session("all");
            $p_id=RoleModel::join("relevances","roles.roles_id","=","relevances.roles_id")->where("admin_id",$info['admin_id'])->join("relevancs","roles.roles_id","=","relevancs.roles_id")->get(['per_id'])->toArray();
            $j_id=[];
            foreach($p_id as $k=>$v){
                $j_id[]=$v['per_id'];
            }
            $urls=PermsModel::whereIn("per_id",$j_id)->get(['per_url'])->toArray();
            $url_info=[];
            foreach($urls as $v){
                $url_info[]=$v['per_url'];
            }
            if (!in_array($url,$url_info)){
                echo '<script>alert("Have no right to access!!!"); location.href="/admin/roles/RoleList"</script>';
            }else{
                return $next($request);

            }
        }
    }
}
 