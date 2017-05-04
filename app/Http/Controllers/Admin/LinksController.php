<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class LinksController extends Controller
{
    //链接管理首页
    public function index(Request $request)
    {
    	$where='';
    	$ob=DB::table('links');
    	if($request->has('name')){
    		$name=$request->input('name');
    		$where['name']=$name;
    		$ob->where('name',$name);
    	}
		if($request->has('present')){
			$present=$request->input('present');
			$where['present']=$present;
			$ob->where('present',$present);
		}
    	$list=$ob->paginate(5);
    	return view('Admin.links.index',['list'=>$list,'where'=>$where]);
    }

    // 链接修改
    public function edit(Request $request)
    {
    	// 处理get请求
    	if($request->method()=='GET'){
    		$id=$request->route('id');
    		$ob=DB::table('links')->where('id',$id)->first();
    		return view('Admin.links.edit',['ob'=>$ob]);
    	}

    	// 处理post请求
    	if($request->method()=='POST'){
    		$id=$request->route('id');
    		$data=$request->only('name','url','present');
    		$result=DB::table('links')->where('id',$id)->update($data);
    		if($result){
    			return redirect('/Admin/links/index')->with('msg','修改成功');
    		}else{
    		 	return redirect('/Admin/links/index')->with('error','修改失败');
    		}
    	}
    }

    // 链接添加
    public function add(Request $request)
    {
    	// 处理get请求
    	if($request->method()=='GET'){
    		return view('Admin.links.add');
    	}

    	// 处理post请求
    	if($request->method()=='POST'){
    		$this->validate($request,[
            	'name'=>'bail|required|unique:links|between:1,10',
            	'url'=>'bail|required|unique:links',
    		],$this->messages());


    		$data=$request->only('name','url','present');
    		$result=DB::table('links')->insertGetId($data);
    		if($request){
    			return redirect('/Admin/links/index')->with('msg','添加成功');
    		}
    	}
    }

    public function messages()
    	{
    		return [
	    		'name.required'=>'链接名必须填写',
	    		'name.unique'=>'链接名已存在',
	    		'name.between'=>'链接名必须4到10位',

	    		'url.required'=>'url地址必须填写',
	    		'url.unique'=>'url地址已存在',
    		];
    	}

    // 删除链接
    public function delete(Request $request)
    {
    	$id=$request->route('id');
    	$result=$result=DB::table('links')->where('id',$id)->delete();
    	if($result){
    		return redirect('/Admin/links/index')->with('msg','删除成功');
    	}else{
    		return redirect('/Admin/links/index')->with('error','删除失败');
    	}
    }
}
