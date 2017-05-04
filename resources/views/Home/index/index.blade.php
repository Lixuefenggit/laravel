<!DOCTYPE html>
<html class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>网易严选 - 以严谨的态度，为中国消费者甄选天下优品</title>
	<meta name="keywords" content="网易严选,严选,网易优选,网易甄选,网易优品,网易精选,甄选家,严选态度" />
	<meta name="description" content="网易严选秉承网易一贯的严谨态度，深入世界各地，严格把关所有商品的产地、工艺、原材料，甄选居家、厨房、饮食等各类商品，力求给你最优质的商品。" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="shortcut icon" href="/favicon.ico?r=gold" type="image/x-icon" />
	<meta property="qc:admins" content="365774662561636375" />
	<link rel="stylesheet" href="{{ asset('Home/shouye/css/style-7d9bd7818b.css') }}" type="text/css" />

	<script type="text/javascript">
	(function(){
	var userAgent = window.navigator.userAgent;
	if(/windows|win32/i.test(userAgent)) {
	if(/Windows NT 5/.test(userAgent)) {
	document.writeln('<style type="text/css">' + 'body,button,input,select,textarea,code{font-family: tahoma,sans-serif;}' + '<' + '/style>');
	}
	} else if(/macintosh/i.test(userAgent)) {
	document.writeln('<style type="text/css">' + 'body,button,input,select,textarea,code{font-family: "Heiti SC","Lucida Grande","Hiragino Sans GB","Hiragino Sans GB W3",verdana;}' + '<' + '/style>');
	}
	})();
	</script>
	<link rel="stylesheet" href="{{ asset('Home/shouye/css/index-a43a3159ca.css') }}">
</head>
<body>
	@include('Home.header.header')
	<div class="g-bd">
		<!-- 轮播图 -->
		<div class="m-focus j-focus">
			<div class="focus-bd">
				<div id="js-focusSlick" class="js-slick m-focusSlick">
					<div class="item f-imgCenterBanner">
						<a class="wrap" href='/Home/goods/20' target="_blank" title="活动 周年庆预热">
							<img class="js-img" src="{{ asset('./Home/shouye/picture/轮播1.jpg') }}" alt="活动 周年庆预热">
						</a>
					</div>
					<div class="item f-imgCenterBanner">
						<a class="wrap" href='/Home/goods/19' target="_blank" title="活动 APP专享价">
							<img class="js-img" src="{{ asset('./Home/shouye/picture/轮播2.jpg') }}" alt="活动 APP专享价">
						</a>
					</div>
					<div class="item f-imgCenterBanner">
						<a class="wrap" href='/Home/goods/17' target="_blank" title="限时购 店庆周">
							<img class="js-img" src="{{ asset('./Home/shouye/picture/轮播3.jpg') }}" alt="限时购 店庆周">
						</a>
					</div>
					<div class="item f-imgCenterBanner">
						<a class="wrap" href='/Home/goods/18' target="_blank" title="类目 厨房">
							<img class="js-img" src="{{ asset('./Home/shouye/picture/轮播4.jpg') }}" alt="类目 厨房">
						</a>
					</div>
					<div class="item f-imgCenterBanner">
						<a class="wrap" href='/Home/goods/13' target="_blank" title="专题 好评999">
							<img class="js-img" src="{{ asset('./Home/shouye/picture/轮播5.jpg') }}" alt="专题 好评999">
						</a>
					</div>
				</div>
			</div>
		</div>









<div class="m-newItem j-newItem">
	<div class="g-row">
		<div class="m-cate">
			<header class="hd">
				<div class="left">
					<h3 class="name">新品首发</h3>
					<small class="frontName">周一周四上新，为你寻觅世间好物</small>
				</div>
			</header>

			<div class="bd">
				<ul class="itemList">
					<div id="js-newItemSlick" class="js-newItemslick m-newItemSlick">
						@for($i=0;$i<count($newGoods);$i++)
						<li class="item">
							<div class="m-product j-product">
								<div class="hd">
									<a href='/Home/goods/{{ $newGoods[$i]->id }}' target="_blank">
										<img src="{{ asset($newGoods[$i]->pic) }}" data-original="" class="j-lazyload img-lazyload img">
									</a>
									
								</div>
								<div class="bd">
									<div class="prdtTags"></div>
									<h4 class="name">
										<a class="name" href='/item/detail?id=1110008&_stat_area=mod_1_item_4&_stat_referer=index' target="_blank">
											<span class="name">{{ $newGoods[$i]->name }}</span>
										</a>
									</h4>
									<p class="price">
										<span>&yen;{{ $newGoods[$i]->price }}</span>
									</p>
								</div>
							</div>
						</li>
						@endfor
					</div>
				</ul>
			</div>
		</div>
	</div>
</div>




<div class="m-newCates j-newCates">

	@for($i=0;$i<count($headerData[0]);$i++)
		@if(count($headerData[0][$i]->children))
		<div class="g-row">
			<div class="m-newCate">
				<header class="hd">
					<div class="left">
						<h3 class="name">{{ $headerData[0][$i]->name }}</h3>
						<small class="frontName">{{ $headerData[0][$i]->depict }}</small>
					</div>
					<div class="right">
						<nav class="subCateList">
							@foreach($headerData[0][$i]->children as $k)
							<b class="spilt">/</b>
							<a class="item" href="/Home/goodsList?xpid={{ $k->id }}?pid2={{ $headerData[0][$i]->id }}">{{ $k->name }}</a>
							@endforeach
						</nav>
						<a class="getMore" href='/Home/goodsList?pid={{ $headerData[0][$i]->id }}'">查看更多 ></a>
					</div>
				</header>

				<div class="banner">
					<a href="/Home/goods/{{ $goodsAll[$i][0]->id }}" target="_blank" title="" class="wrap">
						<img src="{{ asset('/Home/shouye/picture/栏目'.($i+1).'.jpg') }}" alt="" class="j-lazyload img-lazyload ">
					</a>
				</div>

				<div class="bd">
					<ul class="itemList">


						@for($j=0;$j<count($goodsAll[$i]);$j++)
						<li class="item">
							<div class="m-product j-product">
								<div class="hd">
									<a href='/Home/goods/{{ $goodsAll[$i][$j]->id }}' title="全棉贡缎纯色床单" target="_blank">
										<img src="{{ asset($goodsAll[$i][$j]->pic) }}" data-original="" alt="全棉贡缎纯色床单" class="j-lazyload img-lazyload img">
									</a>
									
								</div>
								<div class="bd">
									<div class="prdtTags"></div>
									<h4 class="name">
										<a class="name" href='/item/detail?id=1110008&_stat_area=mod_1_item_4&_stat_referer=index' title="全棉贡缎纯色床单" target="_blank">
											<span class="name">{{ $goodsAll[$i][$j]->name }}</span>
										</a>
									</h4>
									<p class="price">
										<span>&yen;{{ $goodsAll[$i][$j]->price }}</span>
									</p>
								</div>
							</div>
						</li>
						@endfor


					</ul>
				</div>
			</div>
		</div>
		@endif
	@endfor




</div>








<div id="js-fixedtool" class="m-fixedtool">
	
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




<script src="{{ asset('Home/shouye/js/vender-09718b5911.js') }}"></script>
<script src="{{ asset('Home/shouye/js/common-3bc6a836f1.js') }}"></script>
<script src="{{ asset('Home/shouye/js/96ee78c0d9633761581e89d5019c5595.js') }}" defer async></script>
<script type="text/javascript">
window["$global"] = {
giftSwitch : "false",
nickname : "",
username : "",
userid : "0"
};
</script>



<script>
var json_promotion= {}
</script>



<script src="{{ asset('Home/shouye/js/index0dbdeaa221.js') }}"></script>
<script type="text/javascript">
var youdao_conv_id = 285846;
</script>
<script type="text/javascript" src="{{ asset('Home/shouye/js/conv.js') }}" async></script>
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
/*首页*/
window._vlion_mvp=window._vlion_mvp || [];
_vlion_mvp.push(['$setGeneral', 'index', '', /*用户名*/ _username , /*用户id*/ _userid]);
_vlion_mvp.push(['$logInit']);
</script>
<script type="text/javascript">
var currentPageIsIndex = true;
</script>

@include('Home.footer.footer')
</body>
</html>
