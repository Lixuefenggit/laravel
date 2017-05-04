<script src="{{ asset('./Home/shouye/js/jquery-1.8.3.min.js') }}"></script>
<header class="g-hd" id="gTopbar" style="margin-top:-20px">
	<div id="j-siteNav" class="m-siteNav">
		<div class="g-row">
			<p class="declare">好的生活，没那么贵</p>
			<span id="isUserLogin">{{ session('username') }}</span>
			<div class="right">
				@if(session('username'))
				<a href="javascript:;" style="text-align:center;margin-right:0px;color:#ccc;float:left;line-height:35px;width:90px" id="userNameDropDown">
					<p onclick="javascript:location.href='/Home/userinfo'">{{ session('username') }}<img src="{{ asset('./Home/shouye/images/more_unfold.png') }}" alt="" style="width:17px;height:17px;margin-top:10px;margin-left:5px;">
					</p>
					<div style="width:80px;background:white;border:2px solid #DDDDDD;margin-top:1px;display:none" id="listDropDown">
						<ul style="color:#9D9D9D;width:60px;margin:0 auto">
							<li style="border-bottom:1px solid #DDDDDD;" onclick="javascript:location.href='/home/order/statu'">订单管理</li>
							<li style="border-bottom:1px solid #DDDDDD;" onclick="javascript:location.href='/Home/address'">地址管理</li>
							<li style="border-bottom:1px solid #DDDDDD;" onclick="javascript:location.href='/Home/collection/index'">收藏夹</li>
							<li style="" onclick="javascript:location.href='/Home/logout'">退出登录</li>
						</ul>
					</div>
				</a>
				@else
				<a class="login" href="/Home/Qtgluser" style="display:block">登录</a>
				<a class="register" href="/Home/Qtglregister" style="display:block">注册</a>
				@endif

				
				<div class="split"></div>
				<a class="attitude" href="/attitude">严选态度</a>
				<div class="split"></div>
				<a class="attitude" href="/enterprise">企业采购</a>
				<div class="split"></div>
				<div class="custmService w-dropdown w-dropdown-custm" >
					<span class="customerText js-custmServiceToggle" data-jq-dropdown="#js-customerServiceDropdown1">客户服务<i></i></span>
					<div class="jq-dropdown jq-dropdown-relative jq-dropdown-anchor-right" id="js-customerServiceDropdown1">
						<nav class="jq-dropdown-menu dropdownMenu">
							<a class="item" href="/help">帮助中心</a>
							<span class="item j-onlineService">在线客服</span>
							<div class="itemHover">
								<div class="item">
									<span class="itemText">电话客服<span class="triangle"></span></span>
								</div>
								<div class="panel">
									<div class="servicePhoNum">400-0368-163</div>
									<div class="serviceTime">9:00-22:00</div>
								</div>
							</div>
							<a href="/help#business" class="item">商务合作</a>
						</nav>
					</div>
				</div>
				<div class="split"></div>
				<div class="m-dropdown m-hdAppDownload">
					<a class="trigger j-downloadlink" href="#">
						<i class="icon w-icon-normal icon-normal-phone-app"></i>
						<span class="txt">下载APP</span>
					</a>
					<div class="bd">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="js-funcTabWrap">
		<div id="js-funcTab" class="m-funcTab">
			<div class="g-row">
				<a class="tab-logo-activity" href="javascript:;" title="网易严选">
					<img src="{{ asset('./Home/shouye/picture/logo.png') }}" style="margin-top:30px;margin-left:60px">
				</a>
				<a class="tab-logo-fixed" href="" title="网易严选" target="_top"></a>
				<div class="tab-inner">
					<div class="m-search">
						<a class="w-button-cart j-button-cart" href="/Home/shop">
							<i class="w-icon-normal icon-normal-blackcart"></i>
							<i class="w-icon-normal icon-normal-badge j-cart-num" id="shopCount">{{ $headerData[1] }}</i>
						</a>
						<div class="m-searchInput" id="j-search" style="position:relative">
							<div class="w-button-search j-searchButton">
								<i class="w-icon-normal icon-normal-search"></i>
							</div>
							<div class="j-showDefaultWord w-showDefaultWord" ></div>
							<input type="text" maxlength="100" autocomplete="off" class="w-searchInput j-searchInput" value="" placeholder="&nbsp; 周年庆8折卡限时抢先领" data-defaultword='&nbsp;&nbsp;周年庆8折卡限时抢先领' data-searchurl=''>

							<div style="position:absolute;width:252px;z-index:2;border:1px solid #E8E8E8;background:white;top:31px;padding-top:2px;display:none">
								<p style="color:#999999;font-size:13px;margin-left:10px">最近搜索<a><img src="{{ asset('./Home/shouye/images/delete.png') }}" alt="" style="width:15px;height:15px;margin-top:2px;float:right;margin-right:5px"></a></p>
								<ul>
									<li style="height:20px;padding-left:10px">11</li>
									<li style="height:20px;padding-left:10px">11</li>
								</ul>
							</div>

						</div>
					</div>
					<ul class="tab-nav">
						<li class='j-nav-item nav-item'>
							<a class="topLevel" href='/'>首页</a>
						</li>
						@foreach($headerData[0] as $v)
						<li class="j-nav-item nav-item  @if(isset($request))  @if($request->pid==$v->id) active @endif @endif">
							<a class="topLevel" href="/Home/goodsList?pid={{ $v->id }}">{{ $v->name }}</a>
							@if(count($v->children))
								<div class="j-nav-dropdown nav-dropdown">
									<div class="j-nav-cateCard nav-cateCard">
										<ul class="card-list">
											@foreach($v->children as $k)
											<li class="item">
												<a class="nav-subCate" href="/Home/goodsList?xpid={{ $k->id }}&pid2={{ $v->id }}">
													<img class="w-icon-44" src="{{ asset($k->img) }}">
													<p class="text">{{ $k->name }}</p>
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
							@endif
						</li>
						@endforeach
						<li class="split fixed-hide"></li>
						<li class='nav-item fixed-hide '>
							<a class="topLevel" href='/Home/Qtglspecial'>专题</a>
						</li>
						<li class="split fixed-hide"></li>
						<li class='nav-item fixed-hide '>
							<a class="topLevel" href='/home/propose'>甄选家</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>

<style>
	#userNameDropDown div ul li:hover{
		color:red;
	}
</style>
