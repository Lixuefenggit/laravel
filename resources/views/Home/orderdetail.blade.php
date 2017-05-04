<!DOCTYPE html>
<html class="js rgba opacity cssanimations borderradius boxshadow csstransitions csstransforms textshadow">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>订单详情 - 网易严选</title>
        <meta name="keywords" content="网易严选,严选,电子商务,网购,居家,厨房,饮食,甄选家,有态度,一流制造商,匠心打造,源头把控,绿色,安全,舒适,健康,品质,严格甄选,出口品质">
        <meta name="description" content="网易严选秉承网易一贯的严谨态度，深入世界各地，严格把关所有商品的产地、工艺、原材料，甄选居家、厨房、饮食等各类商品，力求给你最优质的商品。">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Cache-Control" content="no-transform">
        <meta http-equiv="Cache-Control" content="no-siteapp">
        <link rel="shortcut icon" href="http://you.163.com/favicon.ico?r=gold" type="image/x-icon">
        <meta property="qc:admins" content="365774662561636375">
        <link rel="stylesheet" href="{{ asset('/Home/css/orderdetail/style-c13a8f5d34.css') }}" type="text/css">
        <script type="text/javascript" async="" src="{{ asset('/Home/css/orderdetail/j.htm') }}"></script>
        <script type="text/javascript" async="" src="{{ asset('/Home/css/orderdetail/456_audience.js') }}"></script>
        <script type="text/javascript" async="" src="{{ asset('/Home/css/orderdetail/conversion.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/Home/css/orderdetail/detail-18880718d7.css') }}"></head>
    
    <body>
    
        @include('Home.header.header')

        <div class="g-bd">
            <div class="g-row">
                <div class="g-sub">
                    <div class="m-userinfo">
                        <div class="w-avatar" id="j-sideAvatarWarp">
                            <img src="{{ asset('/Home/css/orderdetail/c3a03895c73694d922310c76e4915cdb.png') }}" alt="头像" id="j-sideAvatar" width="100px" height="100px">
                            <div class="modifyAvatar w-icon-normal icon-normal-camera"></div>
                            <div class="mask"></div>
                        </div>
                        <div class="w-nickname" title="14900917" id="j-sideNickname">14900917</div>
                        <a class="w-levelname" href="http://you.163.com/membership/index" target="_blank">
                            <div class="logo hidden" id="j-logo"></div>
                            <span class="w-icon-member member-top-vip0" title="普通用户"></span>
                            <span class="levelname level-0">普通用户</span></a>
                        <a class="w-button switch" href="http://you.163.com/u/logout?callback=/u/loginurs">切换帐号</a></div>
                    <!-- 新人不展示邀请返利 -->
                    <div class="m-menu">
                        <a href="/Home/userinfo" class="w-menu-item ">个人信息</a>
                        <a href="/home/order/statu" class="w-menu-item active ">订单管理</a>
                        <a href="/Home/address" class="w-menu-item ">地址管理</a>
                        <a href="" class="w-menu-item j-userCouponNum">优惠券（0）</a>
                        <a href="" class="w-menu-item ">优先购</a>
                        <a href="" class="w-menu-item ">礼品卡</a>
                        <a href="/Home/collection/index" class="w-menu-item ">收藏夹</a>
                        <a href="/Home/safety" class="w-menu-item ">帐号安全</a>
                        <a href="/home/propose" class="w-menu-item ">我的甄选家</a>
                        </div>
                </div>
                <div class="g-main">
                    <div id="j-orderDetailContainer">
                        <div data-reactid=".0">
                            <table class="m-orderDetail" data-reactid=".0.0">
                                <tbody data-reactid=".0.0.0">
                                    <tr data-reactid=".0.0.0.0">
                                        <th class="f-txtleft">
                                            <span class="f-txt-assist">下单时间：</span>
                                            <span >{{ $data->create_at }}</span></th>
                                        <th data-reactid=".0.0.0.0.1">
                                            <span class="f-txt-assist">订单号：</span>
                                            <span >{{ $data->order_num }}</span></th>
                                        <th >
                                            <span ></span>
                                            <span ></span>
                                            <span data-reactid=".0.0.0.0.2.2"></span>
                                        </th>
                                    </tr>
                                    <tr data-reactid=".0.0.0.1">
                                        <td colspan="3" data-reactid=".0.0.0.1.0">
                                            <div class="splitline" data-reactid=".0.0.0.1.0.0"></div>
                                        </td>
                                    </tr>
                                    <tr data-reactid=".0.0.0.2">
                                        <td style="padding-right:0;" data-reactid=".0.0.0.2.0">
                                            <ul class="ul" data-reactid=".0.0.0.2.0.0">
                                                <li data-reactid=".0.0.0.2.0.0.0">
                                                    <div class="label" data-reactid=".0.0.0.2.0.0.0.0">
                                                        <span data-reactid=".0.0.0.2.0.0.0.0.0">收</span>
                                                        
                                                        <span data-reactid=".0.0.0.2.0.0.0.0.2">货</span>
                                                        
                                                        <span data-reactid=".0.0.0.2.0.0.0.0.4">人：</span></div>
                                                    <span class="content" data-reactid=".0.0.0.2.0.0.0.1">{{ $address->add_name }}</span></li>
                                                <li data-reactid=".0.0.0.2.0.0.1">
                                                    <div class="label" data-reactid=".0.0.0.2.0.0.1.0">联系方式：</div>
                                                    <span class="content" data-reactid=".0.0.0.2.0.0.1.1">{{ $address->add_number }}</span></li>
                                                <li data-reactid=".0.0.0.2.0.0.2">
                                                    <div class="label" data-reactid=".0.0.0.2.0.0.2.0">收货地址：</div>
                                                    <span class="content" data-reactid=".0.0.0.2.0.0.2.1">{{ $add }}</span></li>
                                            </ul>
                                        </td>
                                        <td data-reactid=".0.0.0.2.1">
                                            <ul class="ul price" data-reactid=".0.0.0.2.1.0">
                                                <li data-reactid=".0.0.0.2.1.0.0">
                                                    <div class="label" data-reactid=".0.0.0.2.1.0.0.0">商品合计：</div>
                                                    <span class="content" data-reactid=".0.0.0.2.1.0.0.1">
                                                        <span data-reactid=".0.0.0.2.1.0.0.1.0">￥</span>
                                                        <span data-reactid=".0.0.0.2.1.0.0.1.1">{{ $data->total }}</span></span>
                                                </li>
                                                <span data-reactid=".0.0.0.2.1.0.1"></span>
                                                <span data-reactid=".0.0.0.2.1.0.2"></span>
                                                <span data-reactid=".0.0.0.2.1.0.3"></span>
                                                <span data-reactid=".0.0.0.2.1.0.4"></span>
                                                <li data-reactid=".0.0.0.2.1.0.5">
                                                    <div class="label" data-reactid=".0.0.0.2.1.0.5.0">
                                                        <span data-reactid=".0.0.0.2.1.0.5.0.0">运</span>
                                                        <span class="pl28" data-reactid=".0.0.0.2.1.0.5.0.1"></span>
                                                        <span data-reactid=".0.0.0.2.1.0.5.0.2">费：</span></div>
                                                    <span class="content" data-reactid=".0.0.0.2.1.0.5.1">
                                                        <span data-reactid=".0.0.0.2.1.0.5.1.0">￥</span>
                                                        <span data-reactid=".0.0.0.2.1.0.5.1.1">{{ $data->carriage }}</span></span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td data-reactid=".0.0.0.2.2">
                                            <ul class="ul payInfo" data-reactid=".0.0.0.2.2.0">
                                                <span data-reactid=".0.0.0.2.2.0.0"></span>
                                                <span data-reactid=".0.0.0.2.2.0.1"></span>
                                                <span data-reactid=".0.0.0.2.2.0.2"></span>
                                                <span data-reactid=".0.0.0.2.2.0.3"></span>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <noscript data-reactid=".0.1"></noscript>
                            <table class="m-pakcageList" data-reactid=".0.2" cellspacing="0" cellpadding="0">
                                <colgroup data-reactid=".0.2.0">
                                    <col style="width:290px;" data-reactid=".0.2.0.0">
                                        <col style="width:87px;" data-reactid=".0.2.0.1">
                                            <col style="width:87px;" data-reactid=".0.2.0.2">
                                                <col style="width:87px;" data-reactid=".0.2.0.3">
                                                    <col style="width:87px;" data-reactid=".0.2.0.4">
                                                        <col style="width:130px;" data-reactid=".0.2.0.5">
                                                            <col style="width:130px;" data-reactid=".0.2.0.6"></colgroup>
                                <tbody data-reactid=".0.2.1">
                                    <tr class="head" data-reactid=".0.2.1.0">
                                        <th class="f-txtleft" data-reactid=".0.2.1.0.0">
                                            <span class="f-pl20" data-reactid=".0.2.1.0.0.0">商品信息</span></th>
                                        <th data-reactid=".0.2.1.0.1">单价</th>
                                        <th data-reactid=".0.2.1.0.2">数量</th>
                                        <th data-reactid=".0.2.1.0.3">小计</th>
                                        <th data-reactid=".0.2.1.0.4">实付</th>
                                        <th data-reactid=".0.2.1.0.5">包裹</th>
                                        <th data-reactid=".0.2.1.0.6">状态</th>
                                    </tr>

                                    @for($i=0;$i<count($goodsData);$i++)
                                    <tr class="packageItem" data-reactid=".0.2.1.1:$12515053">
                                        <td colspan="5" >
                                            <div >
                                                <span ></span>
                                                <div class="skuItem" >
                                                    <div class="w w1" >
                                                        <div class="good" >
                                                            <a href="/Home/goods/{{ $goodsData[$i]->id }}" class="link" target="_blank">
                                                                <img src="{{ asset($goodsData[$i]->pic) }}" title="{{ $goodsData[$i]->name }}" width="100px" height="100px"></a>
                                                            <div class="info">
                                                                <a class="f-fz14" href="/Home/goods/{{ $goodsData[$i]->id }}" target="_blank">
                                                                    <span></span>
                                                                    <span>{{ $goodsData[$i]->name }}</span></a>
                                                                <br>
                                                                <br>
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w w2">
                                                        <div>
                                                            <p>
                                                                <span>¥</span>
                                                                <span>{{ $goodsData[$i]->price }}</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="w w3">{{ $num[$i] }}</div>
                                                    <div class="w w4">
                                                        <p>
                                                            <span>¥</span>
                                                            <span>{{ intval($num[$i])*intval($goodsData[$i]->price) }}</span></p>
                                                    </div>
                                                    <div class="w w5">
                                                        <span>¥</span>
                                                        <span>{{ intval($num[$i])*intval($goodsData[$i]->price) }}</span></div>
                                                </div>
                                            </div>
                                        </td>
                                        @if($i==0)
                                        <td rowspan="{{ count($num) }}">
                                            <div class="f-txt-assist">
                                                <span>包裹</span>
                                                <span>1</span></div>
                                            <span></span>
                                        </td>
                                        <td rowspan="{{ count($num) }}">
                                            <div>
                                                <div>@if($data->status==1) 待付款 
                                                     @elseif($data->status==2) 待发货
                                                     @elseif($data->status==3) 已发货
                                                     @elseif($data->status==4) 待评价
                                                     @elseif($data->status==5) 已取消
                                                     @elseif($data->status==6) 已评价
                                                     @endif


                                                     </div></div>
                                        </td>
                                        @endif
                                    </tr>

                                @endfor

                                </tbody>
                            </table>
                            <span></span>
                            <noscript></noscript>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="js-fixedtool" class="m-fixedtool m-fixedtool-newuser" style="right: 276.5px; display: block;">
            <!-- <div class="birthdayGift" id="j-birthdayGift"></div> -->
            
            <a class="download j-downloadlink" target="_blank" href="">
                <i>
                </i>
                <p class="text">下载APP</p>
            </a>
            <div id="js-fixedtoolCustomerService" class="customerService">
                <i>
                </i>
                <p class="text">在线客服</p></div>
            <div id="js-fixedtoolGoTop" class="goTop">
                <i>
                </i>
                <p class="text">回顶部</p></div>
        </div>
        <script src="{{ asset('/Home/css/orderdetail/vender-09718b5911.js') }}"></script>
        <script src="{{ asset('/Home/css/orderdetail/common-3bc6a836f1.js') }}"></script>
        <script src="{{ asset('/Home/css/orderdetail/96ee78c0d9633761581e89d5019c5595.js') }}" defer="defer" async=""></script>
        
        <script src="{{ asset('/Home/css/orderdetail/getDetail-b8d30807ad.js') }}"></script>
        <div style="top: 0px; left: 0px; visibility: hidden; position: absolute; width: 1px; height: 1px;">
            <iframe style="height:0px; width:0px;" src="{{ asset('/Home/css/orderdetail/delegate.htm') }}"></iframe>
        </div>
        <div class="layer-3" id="YSF-BTN-HOLDER" style="display: none;">
            <div id="YSF-CUSTOM-ENTRY-3">
                <img src="{{ asset('/Home/css/orderdetail/3.png') }}"></div>
            <span id="YSF-BTN-CIRCLE"></span>
            <div id="YSF-BTN-BUBBLE">
                <div id="YSF-BTN-CONTENT"></div>
                <span id="YSF-BTN-ARROW"></span>
                <span id="YSF-BTN-CLOSE"></span>
            </div>
        </div>
        <div class="m-notify hide">
            <div class="text j-text"></div>
        </div>
        <script type="text/javascript">var youdao_conv_id = 285846;</script>
        <script type="text/javascript" src="{{ asset('/Home/css/orderdetail/conv.js') }}" async=""></script>
        <script type="text/javascript">(function() {
                var j = document.createElement('script');
                j.type = 'text/javascript';
                j.async = true;
                j.defer = true;
                j.src = (('https:' === document.location.protocol) ? 'https://': 'http://') + 'q.vlion.cn/ad/456_main.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(j, s);
            })();</script>
        <script type="text/javascript">var _username = window["$global"]["username"];
            var _userid = window["$global"]["userid"];
            var _islogin = "1";
            if (_userid == "0") {
                _userid = "";
                _islogin = "0";
            }</script>
        <script type="text/javascript">var currentPageIsIndex = false;</script></body>
        
        @include('Home.footer.footer')

</html>