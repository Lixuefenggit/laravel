<?php

namespace App\Http\Middleware;

use Closure;

use DB;

// 后台权限控制
class AuthControl
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
        if(!session('adminuser')){
            return redirect('/admin/login');
        }

        // 获取用户所属角色
        $role=session('adminuser')['role'];
        if($role=="超级管理员"){
            return $next($request);
        }

        // 获取所属角色的权限
        $roles=explode(',', $role);

        $roleObj=DB::table('admin_role');
        foreach($roles as $k=>$v){
            $roleObj->orWhere('name',$v);
        }
        $roleData=$roleObj->get();
        
        $auth='';
        foreach($roleData as $m=>$n){
            if($n->auth){
                $auth .=','.$n->auth;
            }
        }

        // 得到用户的去重后的权限列表
        $auth=array_unique(explode(',', ltrim($auth,',')));
        
        $authObj=DB::table('admin_auth');
        foreach($auth as $k=>$v){
            $authObj->orWhere('auth_name',$v);
        }
        $authData=$authObj->get();

        $urls=[];
        foreach($authData as $k=>$v){
            $temAuth=str_replace("\r\n",",",$v->urls);
            $temAuth=explode(',', $temAuth);
            foreach($temAuth as $m=>$n){
                $urls[]=$n;
            }
        }

        // dd('/'.$request->path());
        // dd($urls);

        if(in_array('/'.$request->path(), $urls)){
            return $next($request);
        }else{
            return redirect('/Admin/noAuth');
        }
        
    }
}
