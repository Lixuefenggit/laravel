<!DOCTYPE html>
<html class="js rgba opacity cssanimations borderradius boxshadow csstransitions csstransforms textshadow rgba opacity cssanimations borderradius boxshadow csstransitions csstransforms textshadow"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>下单成功 - 网易严选</title>
<meta name="keywords" content="网易严选,严选,电子商务,网购,居家,厨房,饮食,甄选家,有态度,一流制造商,匠心打造,源头把控,绿色,安全,舒适,健康,品质,严格甄选,出口品质">
<meta name="description" content="网易严选秉承网易一贯的严谨态度，深入世界各地，严格把关所有商品的产地、工艺、原材料，甄选居家、厨房、饮食等各类商品，力求给你最优质的商品。">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="shortcut icon" href="http://you.163.com/favicon.ico?r=gold" type="image/x-icon">
<meta property="qc:admins" content="365774662561636375">
<link rel="stylesheet" href="{{ asset('/Home/css/complete/style-c13a8f5d34.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/Home/css/complete/complete-99b8d7c39d.css') }}">

</head>
<body>
	@include('Home.header.header')

<div id="couponsTips" style="display:none"></div>
<div class="g-bd f-margin-top-20">
<div class="g-row">
<div class="m-orderCompleteBox">
<div class="m-orderCompletePanel">
<h2 class="text1">
<i class="icon w-icon-normal icon-normal-suc-l"></i>支付成功&nbsp;感谢您的支持
</h2>
</div>
<div class="f-clearfix m-orderCompleteDetail">
<div class="cost f-left left">
<p>商品合计：¥{{ $order->total }}</p>
<p>优惠券：-¥0.00</p>
<p>运费：¥{{ $order->carriage }}</p>
<p>实付：<span class="f-txt-red">¥{{ $order->total }}</span></p>
</div>
<div class="info f-left right">
<p>下单时间：{{ $order->create_at }}</p>
<p>收货人：{{ $adds->add_name }}</p>
<p>联系电话：{{ $adds->add_number }}</p>
<p>收货地址：{{ $addStr }}</p>
</div>
</div>
<div class="m-orderCompleteFt" style="margin-top:-20px;margin-left:250px">
<a class="btn w-button w-button-primary w-button-xl" type="button" href="/Home/orderDetail/{{ $orderNum }}">查看订单</a>

</div>
<div class="m-appDownload">
<img class="phone" src="{{ asset('/Home/css/complete/d1ab9483e61109480972008a7048c615.png') }}" alt="">
<a class="link w-link" href="" target="_blank"><span class="f-txt-red">下载APP首单立减8元</span><br>随时随地了解订单物流&gt;&gt; </a>
</div>
</div>
</div>

</div>

<div id="js-fixedtool" class="m-fixedtool" style="right: 276.5px; display: block;">
<!-- <div class="birthdayGift" id="j-birthdayGift">
</div> -->
<a class="activityEntry j-fixedToolActivity" data-id="1037000" target="_blank" href="">
<img class="activityPic" src="{{ asset('/Home/css/complete/92d3c2cb1118a6f77253420944c28d47.jpg') }}">
</a>
<a class="newuser j-newuser" target="_blank" href="" style="display:none;">
<i></i>
<p class="text">新人有礼</p>
</a>
<a class="download j-downloadlink" target="_blank" href="/downloadapp">
<i></i>

</a>
<div id="js-fixedtoolCustomerService" class="customerService">
<i></i>
<p class="text">在线客服</p>
</div>
<div id="js-fixedtoolGoTop" class="goTop">
<i></i>
<p class="text">回顶部</p>
</div>
</div>
<script src="{{ asset('/Home/css/complete/vender-09718b5911.js') }}"></script>
<script src="{{ asset('/Home/css/complete/common-3bc6a836f1.js') }}"></script>
<script src="{{ asset('/Home/css/complete/96ee78c0d9633761581e89d5019c5595.js') }}" defer="defer" async=""></script>

<script src="{{ asset('/Home/css/complete/complete-5f2f46d03d.js') }}"></script>
<div class="m-notify hide"><div class="text j-text"></div></div><div class="m-notify hide"><div class="text j-text"></div></div>
<div style="top: 0px; left: 0px; visibility: hidden; position: absolute; width: 1px; height: 1px;"><iframe style="height:0px; width:0px;" src="{{ asset('/Home/css/complete/complete-5f2f46d03d.js') }}/delegate.htm"></iframe></div><div class="layer-3" id="YSF-BTN-HOLDER" style="display: none;"><div id="YSF-CUSTOM-ENTRY-3"><img src="{{ asset('/Home/css/complete/3.png') }}"></div><span id="YSF-BTN-CIRCLE"></span><div id="YSF-BTN-BUBBLE"><div id="YSF-BTN-CONTENT"></div><span id="YSF-BTN-ARROW"></span><span id="YSF-BTN-CLOSE"></span></div></div><div style="top: 0px; left: 0px; visibility: hidden; position: absolute; width: 1px; height: 1px;"><iframe style="height:0px; width:0px;" src="{{ asset('/Home/css/complete/delegate_002.htm') }}"></iframe></div><div class="layer-3" id="YSF-BTN-HOLDER" style="display: none;"><div id="YSF-CUSTOM-ENTRY-3"><img src="{{ asset('/Home/css/complete/3_002.png') }}"></div><span id="YSF-BTN-CIRCLE"></span><div id="YSF-BTN-BUBBLE"><div id="YSF-BTN-CONTENT"></div><span id="YSF-BTN-ARROW"></span><span id="YSF-BTN-CLOSE"></span></div></div></body>
	
	@include('Home.footer.footer')

</html>