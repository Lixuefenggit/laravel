<?php

namespace App\Http\Middleware;

use Closure;

// 后台登录判断
class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * 登录中间件
     * author:李学峰
     * date:2017.04.12
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('adminuser')){
            return $next($request);
        }
        return redirect('/admin/login');
    }
}
