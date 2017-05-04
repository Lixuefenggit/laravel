<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class AuthController extends Controller
{
    //用户管理首页
    public function userIndex()
    {
		$where='';
    	$ob=DB::table('admin_users');
    	$list=$ob->paginate(5);
    	return view('Admin.auth.user.index',['list'=>$list,'where'=>$where]);
    }
    // 用户删除
    public function userDelete(Request $request)
    {
    	$id=$request->route('id');
    	$users=DB::table('admin_users')->where('id',$id)->first();
    	// dd($users);
    	if($users->role=='超级管理员'){
    		return redirect('/Admin/auth/user')->with('error','删除失败，超级管理员不能被删除');
    	}
    	$result=DB::table('admin_users')->where('id',$id)->delete();
    	if($result){
    		return redirect('/Admin/auth/user')->with('msg','删除成功');
    	}else{
    		return redirect('/Admin/auth/user')->with('error','删除失败');
    	}
    }
    // 用户修改
    public function userEdit(Request $request)
    {
    	// 处理get请求
    	if($request->method()=='GET'){
    		$id=$request->route('id');
    		$ob=DB::table('admin_users')->where('id',$id)->first();
    		$ob->role=explode(',', $ob->role);
    		// 获取所有角色
    		$roles=DB::table('admin_role')->get();
    		return view('Admin.auth.user.edit',['ob'=>$ob,'roles'=>$roles,'id'=>$id]);
    	}

    	// 处理post请求
    	if($request->method()=='POST'){
            $id=$request->input('id');
            $username=$request->input('name');
    		$roles=$request->input('roles');
    		$result=DB::table('admin_users')->where('id',$id)->update(['username'=>$username,'role'=>$roles]);
    		if($result){
                // 修改成功
                echo 1;
    		}else{
                // 修改失败
                echo 2;
    		}
    	}
    }

    // 角色管理首页
    public function roleIndex()
    {
        $where='';
        $ob=DB::table('admin_role');
        $list=$ob->paginate(5);
        return view('Admin.auth.role.index',['list'=>$list,'where'=>$where]);
    }
    // 角色添加
    public function roleAdd(Request $request)
    {
        // 处理get请求,显示添加页面
        if($request->method()=='GET'){
            $auth=DB::table('admin_auth')->get();
            return view('Admin.auth.role.add',['auth'=>$auth]);
        }
        // 处理post请求，执行添加操作
        if($request->method()=='POST'){
            // $data=$request->input('name','auth');
            $name=$request->input('name');
            $auth=$request->input('auth');
            // 用户名不能为空
            if(!$name){
                echo 2;die;
            }
            $id=DB::table('admin_role')->insertGetId(['name'=>$name,'auth'=>$auth]);
            if($id){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    // 角色修改
    public function roleEdit(Request $request)
    {
        // 处理get请求
        if($request->method()=='GET'){
            $id=$request->route('id');
            $ob=DB::table('admin_role')->where('id',$id)->first();
            $ob->auth=explode(',', $ob->auth);
            // 获取所有角色
            $auth_name=DB::table('admin_auth')->get();
            return view('Admin.auth.role.edit',['ob'=>$ob,'auth_name'=>$auth_name,'id'=>$id]);
        }
        // 处理post请求,执行修改操作
        if($request->method()=='POST'){
            $id=$request->input('id');
            $name=$request->input('name');
            $auth=$request->input('auth');
            $result=DB::table('admin_role')->where('id',$id)->update(['name'=>$name,'auth'=>$auth]);
            if($result){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    // 角色删除
    public function roleDelete(Request $request)
    {
        $id=$request->route('id');
        $result=DB::table('admin_role')->where('id',$id)->delete();
        if($result){
            return redirect('Admin/auth/role')->with('msg','删除成功');
        }else{
            return redirect('Admin/auth/role')->with('error','删除失败');
        }
    }

    // 权限管理首页
    public function index()
    {
        $where='';
        $ob=DB::table('admin_auth');
        $list=$ob->paginate(5);
        return view('Admin.auth.auth.index',['list'=>$list,'where'=>$where]);
    }
    // 增加权限
    public function add(Request $request)
    {
        if($request->method()=='GET'){
            return view('Admin.auth.auth.add');
        }
        if($request->method()=='POST'){
            $auth_name=$request->input('auth_name');
            $urls=$request->input('urls');
            $id=DB::table('admin_auth')->insertGetId(['auth_name'=>$auth_name,'urls'=>$urls]);
            if($id){
                return redirect('Admin/auth')->with('msg','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }
    }
    // 删除权限
    public function delete(Request $request)
    {
        $id=$request->route('id');
        $result=DB::table('admin_auth')->where('id',$id)->delete();
        if($result){
            return back()->with('msg','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    // 修改权限
    public function edit(Request $request)
    {
        // 处理get请求
        if($request->method()=='GET'){
            $id=$request->route('id');
            $list=DB::table('admin_auth')->where('id',$id)->first();
            return view('Admin.auth.auth.edit',['list'=>$list,'id'=>$id]);
        }
        // 处理post请求
        if($request->method()=='POST'){
            $id=$request->input('id');
            $auth_name=$request->input('auth_name');
            $urls=$request->input('urls');
            $result=DB::table('admin_auth')->where('id',$id)->update(['auth_name'=>$auth_name,'urls'=>$urls]);
            if($result){
                return redirect('/Admin/auth')->with('msg','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }
    }

}
