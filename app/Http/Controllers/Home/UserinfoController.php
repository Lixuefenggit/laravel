<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserinfoController extends Controller
{
   	public function index()
   	{  
        $header=new \App\Model\Home\header();
        $headerData=$header->index();

        $id=session('userid');
   		$data=DB::table('users')->where('id',$id)->first();
   	    return view('Home.userinfo',['ob'=>$data,'headerData'=>$headerData]);
   	}


   	public function edit(Request $request,$id)
   	{
        $id=session('userid');
   	    $data=$request->except('_token');
   	    $row=DB::table('users')->where('id',$id)->update($data);
        return redirect('Home/userinfo');
   	}


    public function upload()
    {
        $id=session('userid');
        $data=DB::table('users')->where('id',$id)->first();
        return view('Home.upload',['ob'=>$data]);
    }


    public function doupload(Request $request,$id)
    {   
        $id=session('userid');
        if($request->hasFile('head'))
        { 
            if($request->file('head')->isValid())
            {
                $head = $request->file('head');              //获取上传对象
                $ext = $head->getClientOriginalExtension();      //获取上传文件后缀
                $picName = time().rand(1000,9999).'.'.$ext;          //拼装你需要使用的文件名
                $head->move('./Home/upload',$picName);          //移动临时文件生成新文件
                DB::table('users')->where('id',$id)->update(['head'=>$picName]);
                return redirect('/Home/userinfo');
            }else{
                return redirect('Home/upload');
            }
        }
    }
}
