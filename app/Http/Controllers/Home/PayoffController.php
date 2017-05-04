<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\config;

use DB;

// 支付处理
class PayoffController extends Controller
{
    //
    public function index(Request $request)
    {
        


    	$pay=new \App\config\Pay();

    	// 订单号，唯一
        $out_order_no=$request->orderNum;
        
    	// 订单名称
    	$subject='网易严选支付测试';
    	// 付款金额
    	$total_fee=0.1;
    	// 订单描述
    	$body='欢迎使用网易严选';
        // 异步通知回调地址
    	$notify_url=$pay->notify_url;
        // 同步通知回调地址
    	$return_url=$pay->return_url;
        // 组装传递给支付平台的参数
    	$parameter = array(
			"partner" => $pay->partner,
	        "user_seller"  => $pay->user_seller,
			"out_order_no"	=> $out_order_no,
			"subject"	=> $subject,
			"total_fee"	=> $total_fee,
			"body"	=> $body,
			"notify_url"	=> $notify_url,
			"return_url"	=> $return_url
		);
        // 发送支付请求
    	$html_text = $pay->buildRequestFormShan($parameter, $pay->key);
		return $html_text;
    }

    public function payReturn(Request $request)
    {
    	$pay=new \App\config\Pay();

        // 订单状态
    	$trade_status=$request->input('trade_status');
        // 订单号（唯一）
    	$out_order_no=$request->input('out_order_no');
        // 订单总金额
    	$total_fee=$request->input('total_fee');
        // 校验码
    	$sign=$request->input('sign');
        // 云通付交易订单号
    	$trade_no=$request->input('trade_no');
        // 云通付KEY
    	$key=$pay->key;
        // 云通付PID
    	$partner=$pay->partner;
        // 校验码校验
        $shanNotify = $pay->md5VerifyShan($out_order_no,$total_fee,$trade_status,$sign,$key,$partner);

        if($shanNotify) {//验证成功
            if($_REQUEST['trade_status']=='TRADE_SUCCESS'){
                    $order=DB::table('order')->where('order_num',$out_order_no)->first();
                    if($order){
                        if($total_fee==0.1){
                            // 修改订单状态为已付款待发货
                            if(DB::table('order')->where('order_num',$out_order_no)->update(['status'=>2])){
                                return redirect('/Home/complete/'.$out_order_no);
                            }else{
                                return '订单错误，请联系管理员处理';
                            }
                        }else{
                            return '支付金额与订单应付金额不一致，请联系管理员处理';
                        }
                    }else{
                        return '订单错误';
                    }
                }else{
                    return "支付失败";
                }

        }else{
            return '支付失败，请稍后重试';
        }
    }
}
