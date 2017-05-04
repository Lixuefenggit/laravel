<!DOCTYPE html>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网易严选- 好的生活，没那么贵</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="{{ asset('Home/mjc/yanxuanmoban/css/a.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('Home/mjc/yanxuanmoban/css/b.css') }}">
<link rel="stylesheet" href="{{ asset('Home/mjc/yanxuanmoban/css/content.css') }}">
</head>
<body>

	@include('Home.header.header')

<section class="content">
<form>
	<div class="content_titlebox">
		<div class="content_titlebox_title">		
			<p name="img_title" class="content_titlebox_title_ptitle">
			{{ $list->img_title }}
			</p>		
			<div class="content_titlebox_title_namebox">
				<div class="content_titlebox_title_namebox_nameboxb">
					<p name="title" class="content_titlebox_title_namebox_nameboxb_name">{{ $list->title }}</p>
					<p name="time" class="content_titlebox_title_namebox_nameboxb_time">{{ $list->time }}</p>
				</div>
			</div>
			
		</div>
	</div>
	<div class="content_contentbox">
		<div class="content_contentbox_content">
			<div name="content" class="content_contentbox_content_wenzhang">
			{{ $list->content }}
			</div>
		</div>	
	</div>
</form>	
</section>





























<footer class="g-ft">
<div class="m-ft1">
<div class="g-row">
<div class="item"><div class="m-serviceTel">
<h4 class="hd">客服电话</h4>
<p class="phone">400-0368-163</p>
<p class="datetime">9:00-22:00</p>
<a id="j-feedback" class="w-button btn feedbackBtn" href="javascript:;">用户反馈</a>
<a id="j-kefu" class="w-button btn kefuBtn" href="javascript:;">在线客服</a>
</div>
</div>
<div class="item"><div class="m-whatIsYX">
<h4 class="hd">何为严选</h4>
<p class="desc">
网易原创生活类电商品牌，秉承网易一贯的严谨态度，我们深入世界各地，从源头全程严格把控商品生产环节，力求帮消费者甄选到优质的商品
</p>
<div class="m-followUs">
<p class="title">关注我们&nbsp;:</p>
<div class="m-focusList">
<div class="m-dropdown m-dropdown-2d f-left">
<i class="w-icon-normal icon-normal-yixin"/></i>
<div class="bd">
<div class="wrap">
<img src="{{ asset('Home/mjc/yanxuanmoban/picture/7117e381ba1bb5c2c9dfdafed7810d2e_1.png') }}" alt="严选易信">

</div>
</div>
</div>
<div class="m-dropdown m-dropdown-2d f-left">
<i class="w-icon-normal icon-normal-weixin"/></i>
<div class="bd">
<div class="wrap">
<img src="{{ asset('Home/mjc/yanxuanmoban/picture/a3652c6bd3723412fe5099aea1502e50_1.png') }}" alt="严选微信">
</div>
</div>
</div>
<a class="f-left" href="http://weibo.com/p/1006065627773110/home?from=page_100606&mod=TAB#place" target="_blank">
<i class="w-icon-normal icon-normal-weibo"/></i>
</a>
</div>
</div>
</div>
</div>
<div class="item"><div class="m-ftAppDownload">
<h4 class="hd">扫码下载严选APP</h4>
<!-- <img class="img" src="{{ asset('Home/mjc/yanxuanmoban/picture/3e14428f49e6ec4b8ae2599f8566fd01_1.png') }}" alt="扫码下载严选APP">-->
<div class="m-qrcode j-qrcode"></div>
<div class="tip">首单立减8元</div>
</div>
</div>
</div>
</div>
<div class="m-ft2">
<div class="g-row">
<ul class="m-siteEnsure">
<li class="item">
<div class="inner"><i class="icon w-icon-normal icon-normal-ft1"></i><p class="text">30天无忧退货</p></div>
</li>
<li class="item">
<div class="inner"><i class="icon w-icon-normal icon-normal-ft2"></i><p class="text">满88元免邮费</p></div>
</li>
<li class="item">
<div class="inner"><i class="icon w-icon-normal icon-normal-ft3"></i><p class="text">网易品质保证</p></div>
</li>
</ul>
<hr>
<div class="m-siteInfo">
<nav class="nav">
<a class="text" href="/attitude">关于我们</a>
<b class="split">|</b>
<a class="text" href="/help">帮助中心</a>
<b class="split">|</b>
<a class="text" href="/help#policys">售后服务</a>
<b class="split">|</b>
<a class="text" href="/help#deliver">配送与验收</a>
<b class="split">|</b>
<a class="text" href="/help#business">商务合作</a>
<b class="split">|</b>
<a class="text" href="/enterprise">企业采购</a>
<b class="split">|</b>
<a class="text" href="/friendLink">友情链接</a>
</nav>
<p class="copyright">
网易公司版权所有 © 1997-2017 &nbsp; 食品经营许可证：JY13301080111719
</p>
<a class="businessAdmin" href="http://idinfo.zjaic.gov.cn/bscx.do?method=hddoc&id=33010800002352" target="_blank">
<img src="{{ asset('Home/mjc/yanxuanmoban/picture/86f32b668af6e537389a77480fb5c74d_1.jpg') }}" alt="">
</a>
</div>
</div>
</div>
</footer>
<div id="js-fixedtool" class="m-fixedtool">
<!-- <div class="birthdayGift" id="j-birthdayGift">
</div> -->
<a class = "activityEntry j-fixedToolActivity" data-id="1038000" target="_blank" href="http://you.163.com/act/pub/EjhGrgrZFE.html?_stat_area=fixedTool&_stat_referer=index">
<img src="{{ asset('Home/mjc/yanxuanmoban/picture/6847032abb4a4e820a4816233845eab7_1.jpg') }}">
</a>
<a class="newuser j-newuser" target="_blank" href="/gift/newUserGift?_stat_referer=fixedtool" style="display:none;">
<i></i>
<p class="text">新人有礼</p>
</a>
<a class="download j-downloadlink" target="_blank" href="/downloadapp" >
<i></i>
<p class="text">下载APP</p>
<div class="qrCode">
<div class="img j-qrcode"></div>
<span class="text">首单立减8元</span>
</div>
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
<script src="{{ asset('Home/mjc/yanxuanmoban/js/vender-09718b5911_1.js') }}"></script>
<script src="{{ asset('Home/mjc/yanxuanmoban/js/common-3bc6a836f1_1.js') }}"></script>
<script src="{{ asset('Home/mjc/yanxuanmoban/js/96ee78c0d9633761581e89d5019c5595_1.js') }}" defer async></script>
<script type="text/javascript">
window["$global"] = {
giftSwitch : "false",
nickname : "",
username : "",
userid : "0"
};
window['defaultwordList'] = [];
window['defaultwordList'].push({
"content":'Birkenstock集团制造商凉拖1折价',
"contentUrl":'http://you.163.com/item/list?categoryId=1008000&subCategoryId=1008010&keyword=Birkenstock%E9%9B%86%E5%9B%A2%E5%88%B6%E9%80%A0%E5%95%86%E5%87%89%E6%8B%961%E6%8A%98%E4%BB%B7',
"hidden":0
});
window['defaultwordList'].push({
"content":'新品尝鲜限时买2送1',
"contentUrl":'http://you.163.com/act/pub/EjhGrgrZFE.html?keyword=%E6%96%B0%E5%93%81%E5%B0%9D%E9%B2%9C%E9%99%90%E6%97%B6%E4%B9%B02%E9%80%811',
"hidden":0
});
window['defaultwordList'].push({
"content":'慕思同款乳胶床垫2折价',
"contentUrl":'http://you.163.com/item/list?categoryId=1005000&subCategoryId=1011003&keyword=%E6%85%95%E6%80%9D%E5%90%8C%E6%AC%BE%E4%B9%B3%E8%83%B6%E5%BA%8A%E5%9E%AB2%E6%8A%98%E4%BB%B7',
"hidden":0
});
window['defaultwordList'].push({
"content":'下饭综艺',
"contentUrl":'http://you.163.com/act/pub/ziCkalBDPE.html?keyword=%E4%B8%8B%E9%A5%AD%E7%BB%BC%E8%89%BA',
"hidden":1
});
window['defaultwordList'].push({
"content":'跨界歌王',
"contentUrl":'http://you.163.com/act/pub/I7xNgSS9n2.html?keyword=%E8%B7%A8%E7%95%8C%E6%AD%8C%E7%8E%8B',
"hidden":1
});
</script>
<script>
var tabList = [{"picUrl":"","title":"最新动态","type":-1},{"picUrl":"https://yanxuan.nosdn.127.net/dc1b671ad54e16339f1b26cfeec6a1ea.jpg","title":"严选幕后","type":1},{"picUrl":"https://yanxuan.nosdn.127.net/1de4da49367dd7c01af1f7a2b23b0237.jpg","title":"丁磊私物推荐","type":2},{"picUrl":"https://yanxuan.nosdn.127.net/d943675462a06f817d33062d4eb059f5.jpg","title":"严选推荐","type":0}] || [];
</script>
<script src="{{ asset('Home/mjc/yanxuanmoban/js/list-b69119aa34_1.js') }}"></script>
<script type="text/javascript">
var youdao_conv_id = 285846;
</script>
<script type="text/javascript" src="{{ asset('Home/mjc/yanxuanmoban/js/conv_1.js') }}" async></script>
<script type="text/javascript">
(function(){
var j=document.createElement('script');
j.type='text/javascript';
j.async=true;
j.defer=true;
j.src=(('https:' === document.location.protocol)?'https://':'http://')+'q.vlion.cn/ad/456_main.js';
var s=document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(j,s);
})();
</script>
<script type="text/javascript">
var _username=window["$global"]["username"];
var _userid=window["$global"]["userid"];
var _islogin="1";
if(_userid=="0"){
_userid="";
_islogin="0";
}
</script>
<script type="text/javascript">
var currentPageIsIndex = false;
</script>
	<script src="{{ asset('Home/mjc/yanxuanmoban/js/a.js') }}"></script>
	<script src="{{ asset('Home/mjc/yanxuanmoban/js/b.js') }}"></script>
	<script src="{{ asset('Home/mjc/yanxuanmoban/js/c.js') }}"></script>
	<script src="{{ asset('Home/mjc/yanxuanmoban/js/d.js') }}"></script>
</body>
</html>
