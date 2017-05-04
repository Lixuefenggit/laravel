<?php 

namespace App\config;

class Pay
{
	public $user_seller='385469';

	public $partner= '738513346376621';

	public $key= 'JHeP76Kzd8aMQv8GZxZ3Gi8NgI2gfgAW';

	public $notify_url= "http://www.xisese.com";

	public $return_url= "http://www.xisese.com/Home/payback/return";

	public $gateway_new="http://www.passpay.net/PayOrder/payorder";


	public function aa()
	{
		return 1;
	}

	public function md5VerifyShan($p1, $p2,$p3,$sign,$key,$pid) {
		$prestr = $p1.$p2.$p3.$pid.$key;
		$mysgin = md5($prestr);
		if($mysgin == $sign) {
			return true;
		}else {
			return false;
		}
	}


	function buildRequestFormShan($para_temp,$key) {
		//待请求参数数组
		$para = $this->buildRequestParaShan($para_temp,$key);

		$sHtml = "<form id='paysubmit' name='paysubmit' action='".$this->gateway_new."' accept-charset='utf-8' method='POST'>";
		while (list ($key, $val) = each ($para)) {
	        $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	    }

		//submit按钮控件请不要含有name属性
	    $sHtml = $sHtml."<input type='submit'  value='支付进行中...' style='display:none;'></form>";
		
		$sHtml = $sHtml."<script>document.forms['paysubmit'].submit();</script>";
		
		return $sHtml;
	}


	function buildRequestParaShan($para_temp,$key) {
		//除去待签名参数数组中的空值和签名参数
		$para_filter = $this->paraFilterShan($para_temp);
		//对待签名参数数组排序
		$para_sort = $this->argSortShan($para_filter);
		//生成签名结果
		$mysign = $this->buildRequestMysignShan($para_sort,$key);
		
		//签名结果与签名方式加入请求提交参数组中
		$para_sort['sign'] = $mysign;
		
		return $para_sort;
	}

	function paraFilterShan($para) {
		$para_filter = array();
		while (list ($key, $val) = each ($para)) {
			if($key == "sign" || $val == "")continue;
			else	$para_filter[$key] = $para[$key];
		}
		return $para_filter;
	}

	function argSortShan($para) {
		ksort($para);
		reset($para);
		return $para;
	}

	function buildRequestMysignShan($para_sort,$key) {
		//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
		$prestr = $this->createLinkstringShan($para_sort);
		$mysign = $this->md5SignShan($prestr, $key);
		return $mysign;
	}

	function md5SignShan($prestr, $key) {
		$prestr = $prestr . $key;
		return md5($prestr);
	}

	function createLinkstringShan($para) {
		$arg  = "";
		while (list ($key, $val) = each ($para)) {
			$arg.=$key."=".$val."&";
		}
		//去掉最后一个&字符
		$arg = substr($arg,0,count($arg)-2);
		
		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
		
		return $arg;
	}
}