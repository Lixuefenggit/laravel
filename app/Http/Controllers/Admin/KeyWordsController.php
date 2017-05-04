<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class KeyWordsController extends Controller
{
    //关键词搜索显示
	 public function index(Request $request)
    {
    	$where='';
    	$ob=DB::table('keywords');
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
    	$list=$ob->paginate(2);
    	return view('Admin.keywords.index',['list'=>$list,'where'=>$where]);
    }

    // 编辑关键词
    public function edit(Request $request)
    {
    	// 处理get请求
    	if($request->method()=='GET'){
    		$id=$request->route('id');
    		$ob=DB::table('keywords')->where('id',$id)->first();
    		return view('Admin.keywords.edit',['ob'=>$ob]);
    	}

    	// 处理post请求
    	if($request->method()=='POST'){
    		$id=$request->route('id');
    		$data=$request->only('name','present');
    		$result=DB::table('keywords')->where('id',$id)->update($data);
    		if($result){
    			return redirect('/Admin/keywords/index')->with('msg','修改成功');
    		}else{
    		 	return redirect('/Admin/keywords/index')->with('error','修改失败');
    		}
    	}
    }

    // 添加关键词
    public function add(Request $request)
    {
    	// 处理get请求
    	if($request->method()=='GET'){
    		return view('Admin.keywords.add');
    	}

    	// 处理post请求
    	if($request->method()=='POST'){
    		$this->validate($request,[
            	'name'=>'bail|required|unique:keywords|between:1,10'
    		],$this->messages());

    		$data=$request->only('name','present');
    		$result=DB::table('keywords')->insertGetId($data);
    		if($request){
    			return redirect('/Admin/keywords/index')->with('msg','添加成功');
    		}
    	}
    }

    // 验证传递消息内容
    public function messages()
    	{
    		return [
	    		'name.required'=>'关键词必须填写',
	    		'name.unique'=>'关键词已存在',
	    		'name.between'=>'关键词必须1到10位',
    		];
    	}

    // 删除链接
    public function delete(Request $request)
    {
    	$id=$request->route('id');
    	$result=$result=DB::table('keywords')->where('id',$id)->delete();
    	if($result){
    		return redirect('/Admin/keywords/index')->with('msg','删除成功');
    	}else{
    		return redirect('/Admin/keywords/index')->with('error','删除失败');
    	}
    }
}
