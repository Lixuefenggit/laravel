<?php
/**
*	登录控制器
*	author:李学峰
*	date:2017.04.12
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use Gregwar\Captcha\CaptchaBuilder;
use DB;

class LoginController extends Controller
{
    //登录后台主页
    public function index()
    {	
    	$list = DB::table('admin_users')->get();

    	//获取用户信息
    	$user=session('adminuser')['attributes'];

    	return view('Admin.index',['user'=>$user,'list'=>$list]);
    }

    // 登录方法
    public function doLogin(Request $request)
    {	
    	//获取session中的验证码内容
    	$mycode = session('mycode');
    	
    	//闪存
    	$request->flashOnly(['username', 'password']);

    	// 判断用户输入的验证码和session中的内容是否一致
    	if ($mycode != $request->input('mycode')) {
    		return back()->with('msg','登录失败:验证码不正确');
    	}
    	//实例化模型
    	$user = new User();
    	// 调用模型中的验证用户的方法
    	$ob = $user->checkLogin($request);
    	// var_dump($ob);die();
    	if ($ob) {
    		session(['adminuser'=>$ob]);
    		return redirect('/admin/index');
    	}else{
    		return back()->with('msg','登录失败: 用户名或密码不正确');
    	}
    }

    // 获取验证码
    public function captcha($tmp)
    {
    	
    	$builder = new CaptchaBuilder;

    	$builder->build(200,44,null);

    	$data = $builder->getPhrase();

    	session()->flash('mycode',$data);

    	return response($builder->output())->header('Content-type','image/jpeg');

    }





    // 注册显示
    public  function register()
    {
    	return view('Admin.register');
    }    

    // 注册执行(表单验证)
    public  function doRegister(Request $request)
    {
    	$request->flashOnly(['username','password','email','repassword']);
    	$this->validate($request, [
            'username' => 'required|between:5,15',
            'email' => 'required|email',
            'password' => 'required|same:repassword|between:5,15',
        ],[
            'username.required' => '用户名必须填写',
            'username.between' => '用户名规则不正确,请填写5~15位字母数字下划线',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱必须填写',
            'password.required' => '密码必须填写',
            'password.same' => '密码不一致',
            'password.between' => '密码规则不正确,请填写8~15位字母数字下划线'
        ]);

        $data = $request->except('_token','repassword');

    	 //实例化模型
    	$user = new User();
    	// 调用模型中的验证用户的方法
    	$ob = $user->checkRegister($data);
    	
    	if ($ob == 1) {
    		return back()->with('msg','用户名和邮箱已存在');
    	}elseif($ob == 2){
    		return back()->with('msg','用户名已存在');
    	}elseif($ob == 3){
    		return back()->with('msg','邮箱已存在');
    	}else{

			//获取用户信息
	    	// $user=session('adminuser')['attributes'];

	    	// 设置时区
			date_default_timezone_set('PRC');

			//设置注册时间 
			$data['register_time'] = date('Y-m-d H:i:s',time());

			// var_dump($data);die();

			// DB::table('admin_users')->where('id',$user['id'])->update($user);

    		$data['password'] = md5($data['password']);

    		// var_export($data);die();

    		// dd('@@@@@');
	        $id = DB::table('admin_users')->insertGetId($data);

	        if($id>0){

	            return back()->with('msg','注册成功');
        	}
    	}

    }



    // ajax验证
    public function doAjax(Request $request)
    {	

    	//实例化模型
    	$user = new User();
    	// 获取用户登录的用户名
	    $name = $request->input('username');

    	//通过用户名查询数据库有没有这个用户
	    $ob = $user->where('username',$name)->first();
	    // echo json_encode($list);
		if($ob){
    		return 'true';
    	}else{
    		return 'false';
    	}
    	
    }

     // 退出方法
    public function over()
    {
    	//获取用户信息
    	$user=session('adminuser')['attributes'];

    	// 设置时区
		date_default_timezone_set('PRC');

		//设置上次登录时间 
		$user['last_time'] = $user['login_time'];

		//设置上次登录IP
		$user['last_ip'] = $_SERVER [ 'REMOTE_ADDR' ];

		DB::table('admin_users')->where('id',$user['id'])->update(['last_time'=>$user['last_time'],'last_ip'=>$user['last_ip']]);

    	session()->forget('adminuser');
    	return redirect('/admin/login');
    } 


}
