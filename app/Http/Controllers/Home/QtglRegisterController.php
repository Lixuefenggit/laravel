<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Mail;

use App\Model;

use TopClient;

use AlibabaAliqinFcSmsNumSendRequest;

class QtglRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.Qtglregister.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Qtglregister.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:8|max:20',
            'password' => 'required|min:8|max:20',
            'age' => 'integer|min:0|max:120',
            'phone' => 'required|min:11|max:12',
        ],$this->messages()); 
        // 验证手机验证码
        if($request->input('phoneCode')!=session('phoneCode')){
            return redirect('Home/Qtglregister')->with('error','手机验证码输入错误');
        }
        //资源前台页面的name字段
        $name = $request->input('name');
        //数据库里的'name'字段和 前台页面的$name字段是否相等 取出first一行的值
        $shuju = DB::table('users')->where('name',$name)->first();
        $data = $request->except('_token','phoneCode');
        if(!$shuju){
                $id = DB::table('users')->insertGetId($data);
                if($id>0){
                    // 删除session里的验证码
                    $request->session()->forget('phoneCode');
                    // 发送验证邮件
                    $code=md5($id);
                    $email=$request->input('eamil');

                    $mail=new \App\Model\Mail();
                    $mail->to=$email;
                    $mail->subject="网易严选账号激活";
                    $mail->content="http://yanxuan.com/Home/register/mailactive?uid=".$id."&code=".$code;

                    Mail::send('Home.Qtglregister.mail',['mail'=>$mail],function($msg) use($mail){
                        $msg->to($mail->to,'尊敬的用户');
                        $msg->subject($mail->subject);
                    });

                    DB::table('mail_tmp')->insertGetId(['uid'=>$id,'code'=>$code]);

                    return redirect('Home/Qtglskip')->with('msg','注册成功,请前往邮箱进行激活');
                }
            }else{
                return redirect('Home/Qtglregister')->with('error','用户名已被用，注册失败'); 
        }
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
    public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'name.min' => '用户名不得少于8位',
            'name.max' => '用户名不得大于20位',
            'password.required' => '密码必须填写',
            'password.min' => '密码不得少于8位',
            'password.max' => '密码不得大于20位',
            'age.integer'  => '年龄必须为整数',
            'age.min'  => '请输入年龄最小为0以上的整数',
            'age.max'  => '请输入年龄最大120以下的整数',
            'phone.required'  => '手机号不能为空',
            'phone.min'  => '手机号必须11位整数',
            'phone.max'  => '手机号必须11位整数',
        ];
    }    

    // 生成并发送验证码
    public function getCode(Request $request,$number)
    {
        $c = new TopClient;
        $c->appkey = '23746879';
        $c->secretKey = '38238f1f5c02177ad94f30e630cdb067';
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        // 公共回传参数，在“消息返回”中会透传回该参数；举例：用户可以传入自己下级的会员ID，在消息返回时，该会员ID会包含在内，用户可以根据该会员ID识别是哪位会员使用了你的应用
        $req->setExtend("123456");
        // 短信类型，传入值请填写normal
        $req->setSmsType("normal");
        // 短信签名，传入的短信签名必须是在阿里大鱼“管理中心-短信签名管理”中的可用签名
        $req->setSmsFreeSignName("严选测试");

        $sendCode=rand(1000,9999);
        $req->setSmsParam("{\"name\":\"$number\",\"code\":\"$sendCode\",\"time\":\"1\"}");
        $req->setRecNum($number);
        $req->setSmsTemplateCode("SMS_61000039");
        $resp = $c->execute($req);
        if($resp->result->success==true){
            session(['phoneCode'=>$sendCode]);
            echo 1;
        }else{
            echo 0;
        }
        
    }

    // 删除session里的验证码
    public function deleteCode()
    {
        $request->session()->forget('phoneCode');
        echo 1;
    }

    // 激活邮箱
    public function mailActive(Request $request)
    {
        $uid=$request->input('uid');
        $code=$request->input('code');
        $res=DB::table('mail_tmp')->where('uid',$uid)->first()->code;
        if($code==$res){
            if(DB::table('users')->where('id',$uid)->update(['active'=>1])){
                return redirect('/');
            }else{
                return '激活失败';
            } 
        }else{
            return '激活失败';
        }
    }
}
