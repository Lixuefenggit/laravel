<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model;
//验证码插件
use Gregwar\Captcha\CaptchaBuilder;
use DB;

use URL;

class QtglUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header=new \App\Model\Home\header();
        $headerData=$header->index();
        if($request->has('back')){
            return view('Home.Qtgluser.index',['headerData'=>$headerData,'back'=>$request->input('back')]);
        }else{
            return view('Home.Qtgluser.index',['headerData'=>$headerData]);  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 验证登录
   public function dologin(Request $request){


        //获取session中的验证码内容
        $mycode = session('mycodea');
        //判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('mycode')){
            return back()->with('msg','登陆失败:验证码不正确');
        }
        $request->input('mycode');
        //实例化模型
        $user = new \App\Model\User();
        //调用模型中的验证用户的方法
        $ob = $user->checkUser($request);
        if($ob){
            // session里存储用户名，用户id，用户类型：0=>普通注册用户，1=>微博登录用户，2=>QQ登录用户
            session(['username'=>$ob->name,'userid'=>$ob->id]);
            if($request->has('back')){
                return redirect($request->input('back'));
            }else{
                return redirect('/');
            }
        }else{
            return back()->with('msg','登陆失败:用户或密码不正确');
        }
    }

    // 请求生成验证码
    public function captch()
    {
        //生成验证码图片的builder对象
        $builder = new CaptchaBuilder;
        //设置验证码的宽高字体
        $builder->build(150,35,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycodea',$data);
        //浏览器这是一张图
        header('content-type:image/jpeg');
        //生成图片
        //$builder->output();die;
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->forget('userid');
        return back();
    }
}
