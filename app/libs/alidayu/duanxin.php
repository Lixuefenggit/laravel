<?php 
	include "TopSdk.php";

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

	$req->setSmsParam("{\"name\":\"18310400917\",\"code\":\"123456\",\"time\":\"2\"}");
	$req->setRecNum("18310400917");
	$req->setSmsTemplateCode("SMS_61000039");
	$resp = $c->execute($req);
	var_dump($resp);