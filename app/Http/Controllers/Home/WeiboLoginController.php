<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\libs\weibo;

use DB;
class WeiboLoginController extends Controller
{
    //
    public function index()
    {
    	return view('Home.weibo.index');
    }

    public function login(Request $request)
    {
    	$client_id='4145577427';
    	$client_secret='a9177b24bcd6e7ff898698e4360ae136';
    	$url="http://www.xisese.com/Home/weiboLogin/callback";

    	$oAuth=new \App\libs\weibo\SaeTOAuthV2($client_id,$client_secret);

    	return redirect($oAuth->getAuthorizeURL($url));
    	
    }

    public function callback(Request $request)
    {
    	$code=$request->input('code');


    	$client_id='4145577427';
    	$client_secret='a9177b24bcd6e7ff898698e4360ae136';
    	$url="http://www.xisese.com/Home/weiboLogin/callback";

        $keys['code']=$code;
        $keys['redirect_uri']=$url;
    	// 实例化oAuth类
    	$oAuth=new \App\libs\weibo\SaeTOAuthV2($client_id,$client_secret);
    	// 得到access_token和uid等信息
    	$data=$oAuth->getAccessToken($keys);

    	// 实例化接口类
    	$userInfo=new \App\libs\weibo\SaeTClientV2($client_id,$client_secret,$data['access_token']);
    	$userData=$userInfo->show_user_by_id($data['uid']);

        // dd($userData);
    	// // dd($userData['name']);
        $user=DB::table('users')->where('weiboId',$userData['id'])->first();
        if($user){
            DB::table('users')->where('weiboId',$userData['id'])->update(['name'=>$userData['name']]);
            session(['username'=>$userData['name'],'userid'=>$user->id]);
            return redirect('/');
        }else{
            // 用户名
            $name=$userData['name'];
            // 密码
            $password=md5($userData['id']);
            $weiboId=$userData['id'];
            $id=DB::table('users')->insertGetId(['name'=>$name,'password'=>$password,'weiboId'=>$weiboId]);
            session(['username'=>$userData['name'],'userid'=>$id]);
            return redirect('/');
        }
    }
}
