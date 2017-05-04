<?php

namespace App\Http\Middleware;

use Closure;

use URL;

// 前台登录判断
class HomeLogin
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
        if(!$request->session()->has('username')){
            // return redirect('/Home/Qtgluser');
            $back=URL::previous();
            return redirect()->action('Home\QtglUserController@index',['back'=>$back]);
        }

        return $next($request);
    }
}
