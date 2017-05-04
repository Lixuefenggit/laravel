<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

use DB;

class User extends Model
{
  
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    // protected $timestamps = 'false';

    // 后台登录验证
    public function checkLogin($request)
    {	

	    	// 获取用户登录的用户名
	    	$name = $request->input('username');

	    	//通过用户名查询数据库有没有这个用户
	    	$ob = $this->where('username',$name)->first();

	    	$ob = $ob['attributes'];


	    	// 如果查出有用户，则验证密码
	    	if($ob){
	    		if(md5($request->input('password')) == $ob['password']){
	    			// 设置时区
	    			date_default_timezone_set('PRC');

	    			// 登录次数
	    			$ob['degree'] += 1;

					$ob['login_time'] = date('Y-m-d H:i:s',time());

	    			// 登录IP
	    			$ob['current_ip'] = $_SERVER [ 'REMOTE_ADDR' ];



	    			DB::table('admin_users')->where('id',$ob['id'])->update($ob);
	    			$ob = $this->where('username',$name)->first();
	    			return $ob;
	    		}else{
	    			return null;
	    		}
	    	}else{
	    		return null;
	    	}
    	
    }     


    // 后台注册验证
    public function checkRegister($request)
    {		
    	// var_dump($request);die();

	    	// 获取用户注册用户名
	    	$name = $request['username'];

	    	// 获取用户登录的用
	    	$email = $request['email'];

	    	//查询用户名
	    	$ob = $this->where('username',$name)->first();

	    	//查询邮箱
	    	$ob2 = $this->where('email',$email)->first();
	    	
	    	// 如果查出有用户，则验证密码
	    	if(!empty($ob)&& !empty($ob2)){
	    			
	    		return 1;
	    		
	    	}elseif(!empty($ob)){

	    		return 2;
	    	}elseif(!empty($ob2)){

	    		return 3;
	    	}else{
	    		return 'true';
	    	}
    	
    } 


}
