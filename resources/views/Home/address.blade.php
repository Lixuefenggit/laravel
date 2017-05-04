<!DOCTYPE html>
<html class="js rgba opacity cssanimations borderradius boxshadow csstransitions csstransforms textshadow">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>地址管理 - 网易严选</title>
        <meta name="keywords" content="网易严选,严选,电子商务,网购,居家,厨房,饮食,甄选家,有态度,一流制造商,匠心打造,源头把控,绿色,安全,舒适,健康,品质,严格甄选,出口品质" />
        <meta name="description" content="网易严选秉承网易一贯的严谨态度，深入世界各地，严格把关所有商品的产地、工艺、原材料，甄选居家、厨房、饮食等各类商品，力求给你最优质的商品。" />
        <meta name="renderer" content="webkit" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="Cache-Control" content="no-transform" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="shortcut icon" href="http://you.163.com/favicon.ico?r=gold" type="image/x-icon" />
        <meta property="qc:admins" content="365774662561636375" />
        <link rel="stylesheet" href="{{ asset('/Home/css/address/style-7d9bd7818b.css') }}" type="text/css" />
        <script type="text/javascript" async="" src="{{ asset('/Home/css/address/j.htm') }}"></script>
        <script type="text/javascript" async="" src="{{ asset('/Home/css/address/456_audience.js') }}"></script>
        <script type="text/javascript" async="" src="{{ asset('/Home/css/address/_aa_check_.htm') }}"></script>
        <script type="text/javascript" async="" src="{{ asset('/Home/css/address/conversion.js') }}"></script>
        <script type="text/javascript" async="" defer="defer" src="{{ asset('/Home/css/address/456_main.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/Home/css/address/address-7310c0cec2.css') }}" />

        <style type="text/css">#YSF-BTN-HOLDER{position: fixed;max-width:70px;max-height:70px;right: 30px; bottom: 0px; cursor: pointer; overflow: visible; filter: alpha(opacity=100);opacity:1;z-index: 9990} #YSF-BTN-HOLDER:hover{filter: alpha(opacity=95);opacity:.95} #YSF-BTN-HOLDER img{ display: block;overflow: hidden; } #YSF-BTN-CIRCLE{display: none;position: absolute;right: -5px;top: -5px;width: auto;min-width: 12px;height: 20px;padding: 0 4px;background-color: #f00;font-size: 12px;line-height: 20px;color: #fff;text-align: center;white-space: nowrap;font-family: sans-serif;border-radius: 10px;z-index:1;} #YSF-BTN-HOLDER.layer-1 #YSF-BTN-CIRCLE{top: -30px;} #YSF-BTN-HOLDER.layer-2 #YSF-BTN-CIRCLE{top: -30px;} #YSF-BTN-HOLDER.layer-3 #YSF-BTN-CIRCLE{top: -30px;} #YSF-BTN-HOLDER.layer-4 #YSF-BTN-CIRCLE{top: -30px;} #YSF-BTN-HOLDER.layer-5 #YSF-BTN-CIRCLE{top: -30px;} #YSF-BTN-HOLDER.layer-6 #YSF-BTN-CIRCLE{top: -5px;} #YSF-BTN-BUBBLE{display: none;position: absolute;left: -274px;bottom:0px;width: 278px;height: 80px;box-sizing: border-box;padding: 14px 22px;filter: alpha(opacity=100);opacity:1;background: url(https://qiyukf.com/sdk//res/img/sdk/bg_floatMsg2x.png) no-repeat;background:url(https://qiyukf.com/sdk//res/img/sdk/bg_floatMsg.png)9; background-size: 278px 80px; z-index: 1;} #YSF-BTN-HOLDER.layer-1 #YSF-BTN-BUBBLE{bottom:9px;} #YSF-BTN-HOLDER.layer-2 #YSF-BTN-BUBBLE{bottom:9px;} #YSF-BTN-HOLDER.layer-3 #YSF-BTN-BUBBLE{bottom:9px;} #YSF-BTN-HOLDER.layer-4 #YSF-BTN-BUBBLE{bottom:9px;} #YSF-BTN-HOLDER.layer-5 #YSF-BTN-BUBBLE{bottom:9px;} #YSF-BTN-HOLDER.layer-6 #YSF-BTN-BUBBLE{bottom:-6px;} #YSF-BTN-BUBBLE:hover{filter: alpha(opacity=95);opacity:.95} #YSF-BTN-CONTENT{height:45px;padding: 0;white-space: normal;word-break: break-all;text-align: left;font-size: 14px;line-height: 1.6;color: #222;overflow: hidden;z-index: 0;} #YSF-BTN-ARROW{ display: none; } #YSF-BTN-CLOSE{position: absolute; width:15px; height:15px;right: 4px;top: -3px; filter: alpha(opacity=90); opacity:.9; cursor: pointer; background: url(https://qiyukf.com/sdk//res/img/sdk/btn-close.png) no-repeat;z-index: 1} #YSF-BTN-CLOSE:hover{filter: alpha(opacity=100); opacity: 1;} #YSF-PANEL-CORPINFO.ysf-chat-layeropen{ width: 511px; height: 470px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, .15);} #YSF-PANEL-CORPINFO{ position: fixed; bottom: 0px; right: 20px; width: 0; height: 0; z-index: 99999; } #YSF-PANEL-INFO.ysf-chat-layeropen{ width: 311px; height: 470px; filter: alpha(opacity=100);opacity:1; box-shadow: 0 0 20px 0 rgba(0, 0, 0, .15);} #YSF-PANEL-INFO{ position: fixed; bottom: 0px; right: 20px; width: 0px; height: 0px; filter: alpha(opacity=0);opacity:0;z-index: 99999;} #YSF-PANEL-INFO .u-btn{background-color: #F96868} #YSF-CUSTOM-ENTRY{background-color: #F96868;} #YSF-CUSTOM-ENTRY-0{position: relative;bottom: 24px;width:auto;background-color: #F96868;box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-1{position: relative;bottom: 24px;width:auto;background-color: #F96868;border-radius: 14px; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-2{position: relative;bottom: 24px;width:auto;background-color: #F96868;border-radius: 0;box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-3{position: relative;bottom: 24px;width:auto;background-color: #F96868;border-radius: 50%;box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-4{position: relative;bottom: 24px;width:auto;background-color: #F96868;border-radius: 50%;box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-5{position: relative;bottom: 24px;width:auto;background-color: #F96868;border-radius: 5px;box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);} #YSF-CUSTOM-ENTRY-6{position: relative;bottom: 0px;width:auto;background-color: #F96868;border-radius:5px;border-bottom-left-radius: 0;border-bottom-right-radius: 0;} #YSF-CUSTOM-ENTRY-0 img{max-width: 300px;height:auto;} #YSF-CUSTOM-ENTRY-1 img{width:28px;height:auto;} #YSF-CUSTOM-ENTRY-2 img{width:58px;height:auto;} #YSF-CUSTOM-ENTRY-3 img{width:60px;height:auto;} #YSF-CUSTOM-ENTRY-4 img{width:60px;height:auto;} #YSF-CUSTOM-ENTRY-5 img{width:60px;height:auto;} #YSF-CUSTOM-ENTRY-6 img{width:115px;height:auto;} #YSF-IFRAME-LAYER{ border:0; outline:none; } .ysf-online-invite-mask{z-index:10000;position:fixed;_position:absolute;top:0;left:0;right:0;bottom:0;width:100%;height:100%;background:#fff;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0);opacity:0;} .ysf-online-invite-wrap{z-index:10001;position:fixed;_position:absolute;top:50%;left:50%;width:250px;} .ysf-online-invite{position:relative;top:-50%;left:-50%;cursor:pointer;} .ysf-online-invite img{display:block;width:250px;} .ysf-online-invite .text{position:absolute;top:-11px;left:0;right:0;overflow:hidden;margin: 36px 20px 0 67px;line-height:140%;color:#526069;font-size:14px;font-family:"Microsoft YaHei","微软雅黑",tahoma,arial,simsun,"宋体";text-align:left;white-space:normal;word-wrap:break-word;} .ysf-online-invite .close{position:absolute;top:-6px;right:-6px;width:32px;height:32px;background:url(https://qiyukf.com/sdk/res/img/invite-close.png) no-repeat;cursor:pointer;}</style></head>
    
    <body>

		@include('Home.header.header')

        <div class="j-mini-cart m-mini-cart j-newMiniCart">
            <div id="newMiniCart"></div>
        </div>
        <div class="user js-userCenter w-dropdown w-dropdown-text">
            <a href="http://you.163.com/order/myList" class="js-userCenterToggle icon" data-jq-dropdown="#js-userCenterDropdown2"></a>
            <div id="js-userCenterDropdown2" class="jq-dropdown jq-dropdown-relative jq-dropdown-anchor-center">
                <nav class="jq-dropdown-menu dropdownMenu">
                    <a class="item" href="/home/order/statu">订单管理</a>
                    <a class="item" href="#">地址管理</a>
                    <a class="item couponLink" href="">优惠券
                        <span class="useableCouponCount"></span></a>
                    <a class="item" href="">礼品卡</a>
                    <a class="item" href="/Home/collection/index">收藏夹</a>
                    <a class="item" href="/home/propose">我的甄选家</a>
                    <a class="item" href="http://you.163.com/u/logout">退出登录</a></nav>
            </div>
        </div>
        <div class="g-bd">
            <div class="g-row">
                <div class="g-sub" style="height:700px;">
                    <div class="m-userinfo">
                        <div class="w-avatar" id="j-sideAvatarWarp">
                            <img src="{{ asset('/Home/css/address/c3a03895c73694d922310c76e4915cdb.png') }}" alt="头像" id="j-sideAvatar" height="100px" width="100px" />
                            <div class="modifyAvatar w-icon-normal icon-normal-camera"></div>
                            <div class="mask"></div>
                        </div>
                        <div class="w-nickname" title="14900917" id="j-sideNickname">14900917</div>
                        <a class="w-levelname" href="http://you.163.com/membership/index" target="_blank">
                            <div class="logo hidden" id="j-logo"></div>
                            <span class="w-icon-member member-top-vip0" title="普通用户"></span>
                            <span title="严选会员" class="levelname">普通用户</span></a>
                        <a class="w-button switch" href="">切换帐号</a></div>
                    <!-- 新人不展示邀请返利 -->
                    <script>var membershipOn = false;
                        membershipOn = true;</script>
                    <div class="m-menu">
                        <a href="/Home/userinfo" class="w-menu-item ">个人信息</a>
                        <a href="/home/order/statu" class="w-menu-item ">订单管理</a>
                        <a href="" class="w-menu-item active">地址管理</a>
                        <a href="" class="w-menu-item ">优惠券</a>
                        <a href="" class="w-menu-item ">礼品卡</a>
                        <a href="/Home/collection/index" class="w-menu-item ">收藏夹</a>
                        <a href="/Home/safety" class="w-menu-item ">帐号安全</a>
                        <a href="/home/propose" class="w-menu-item ">我的甄选家</a></div>
                </div>
                <div class="g-main">
                    @if(session('tip'))
                    <h1 style="font-size:15px">{{ session('tip') }}</h1>
                    @endif
                    <div class="j-address-con">
                        <div class="w-address-top">
                            <a href="javascript:;" class="w-link add j-add" onclick="doshow()">+新建地址</a></div>
                        <table class="m-addressList">
                            <colgroup>
                                <col class="w1">
                                    <col class="w2">
                                        <col class="w3">
                                            <col class="w4">
                                                <col class="w5"></colgroup>
                            <tr>
                                <th>收货人</th>
                                <th>地址</th>
                                <th>联系方式</th>
                                <th>操作</th>
                                <th></th>
                            </tr>
                            @for($i=0;$i<count($sum);$i++) 
                                <tr>
                                    
                                    <td class="addressName">{{ $sum[$i][1] }}</td>
                                    <td>{{ $sum[$i][2] }}<span class="addressDetail">{{ $sum[$i][4] }}</span></td>
                                    <td class="addressNumber">{{ $sum[$i][3] }}</td>
                                    
                                    <input type="hidden" value="{{ $sum[$i][0] }}">
                                    <td>
                                        <a href="javascript:;" class="w-link j-update" onclick="doshow_b(this)">编辑</a>
                                        <a class="w-link w-link-1 j-delete deleteAddress" href='javascript:;'>删除</a>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            @endfor
                        </table>
                        <!-- 新建地址 -->
                        <div id="yinc1" style="display:none">
                            <div class="m-pop f-scroll-y overlay-container-ani f-tlbr j-overlay-container m-pop-addr f-ani-bouncein" style="display: block;">
                                <div class="j-w-dialog-body" style="left: 641.5px; top: 303px;">
                                    <div class="j-w-dialog-head"></div>
                                    <div class="popwin-bd j-w-dialog-content">
                                        <div class="w-tit-addr">新建地址</div>
                                        <input name="id" value="" type="hidden" />
                                        <div>
                                            <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;">所有地址：</span>
                                            <div style="float:left; display:inline; margin:0px;padding:0px;" id="newContainer"></div>
                                            <div style="clear:both"></div>
                                            <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:20px;">详细地址：
                                                <textarea id="xxdz" placeholder="街道、门牌号等" style="border:1px solid #DDDDDD;margin:0px;padding:0px;margin-top:15px;height:82px;width:410px;"></textarea></span>
                                        </div>
                                        <div style="clear:both"></div>
                                        <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:25px;">收货人：</span>
                                        <div style="float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:20px;">
                                            <input class="w-ipt" name="add_name" value="" tabindex="1" type="text" /></div>
                                        <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:58px;">手机号：</span>
                                        <div style="float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:20px;">
                                            <input class="w-ipt" name="add_number" value="" tabindex="1" type="text" /></div>
                                        <div style="clear:both"></div>
                                        <div class="w-col-1" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:40px;margin-left:40px;">
                                            <div class="w-chkbox">
                                                <input name="dft" class="j-checkbox" type="checkbox" value="1" id="isDefault"  />
                                                <span>设为默认</span></div>
                                        </div>
                                        <br />
                                        <div class="w-col-3" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:40px;">
                                            <button class="w-button w-button-primary w-button-l j-submit" style="margin-left:173px;" id="btn1">确定</button>
                                            <div class="w-errorMsg j-msg" style="display: none;left:173px;top:48px;">
                                                <i class="icon w-icon-normal icon-normal-disable"></i>
                                                <span class="text j-msg-con"></span>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 修改地址 -->
                    <div id="yinc2" style="display:none">
                        <div class="m-pop f-scroll-y overlay-container-ani f-tlbr j-overlay-container m-pop-addr f-ani-bouncein" style="display: block;">
                            <div class="j-w-dialog-body" style="left: 641.5px; top: 303px;">
                                <div class="j-w-dialog-head"></div>
                                <div class="popwin-bd j-w-dialog-content">
                                    <div class="w-tit-addr">修改地址</div>
                                    <div>
                                        <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;">所有地址：</span>
                                        <div style="float:left; display:inline; margin:0px;padding:0px;" id="editContainer"></div>
                                        <div style="clear:both"></div>
                                        <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:20px;">详细地址：
                                            <textarea placeholder="街道、门牌号等" style="border:1px solid #DDDDDD;margin:0px;padding:0px;margin-top:15px;height:82px;width:410px;" class="addressDetail" id="addressDetailDiv"></textarea></span>
                                    </div>
                                    <div style="clear:both"></div>
                                    <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:25px;">收货人：</span>
                                    <div style="float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:20px;">
                                        <input class="w-ipt receiver" name="add_name2" value="" tabindex="1" type="text" id="addressNameDiv" /></div>

                                    <span class="w-label" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:58px;">手机号：</span>
                                    <div style="float:left; display:inline; margin:0px;padding:0px;margin-top:25px;margin-left:20px;">
                                        <input class="w-ipt phoneNumber" name="add_number2" value="" tabindex="1" type="text" id="addressNumberDiv"  /></div>
                                    <div style="clear:both"></div>
                                    <div class="w-col-1" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:40px;margin-left:40px;">
                                        <div class="w-chkbox">
                                            <input name="dft2" class="j-checkbox" type="checkbox" value="1" />
                                            <span>设为默认</span></div>
                                    </div>
                                    <br />
                                    <div class="w-col-3" style="vertical-align: top;margin-top:6px;float:left; display:inline; margin:0px;padding:0px;margin-top:40px;">
                                        <button class="w-button w-button-primary w-button-l j-submit" style="margin-left:173px;" id="btn2">确定</button>
                                        <div class="w-errorMsg j-msg" style="display: none;left:173px;top:48px;">
                                            <i class="icon w-icon-normal icon-normal-disable"></i>
                                            <span class="text j-msg-con"></span>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="{{ asset('/Home/css/address/vender-09718b5911.js') }}"></script>
        <script src="{{ asset('/Home/css/address/common-3bc6a836f1.js') }}"></script>
        <script src="{{ asset('/Home/css/address/96ee78c0d9633761581e89d5019c5595.js') }}" defer="defer" async=""></script>
        <script src="{{ asset('/Home/css/address/address-5cd6540247.js') }}"></script>
        <div class="m-notify hide">
            <div class="text j-text"></div>
        </div>
        </div>
        </div>
    </body>

</html>
<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script>// 添加地址
    var yinc1 = document.getElementById('yinc1');
    function doshow(a) {
        if (yinc1.style.display == 'none') {
            $.get('/Home/address/getCity', {
                'id': 0
            },
            function(data) {
                data = eval("(" + data + ")");
                for (var i = 0; i < data.length; i++) {
                    var select = $("<select class='append w-select j-province'></select>");
                    $('#newContainer').append(select);
                }
                $('.append').each(function(i) {
                    var option = '';
                    for (var j = 0; j < data[i].length; j++) {
                        option += "<option class='j-province' value=" + data[i][j]['id'] + ">" + data[i][j]['name'] + "</option>";
                    }
                    $(this).append(option);
                });
                $('.append').removeClass('append');
            });
            yinc1.style.display = 'block';
        } else {
            $('#newContainer').children().remove();
            yinc1.style.display = 'none';
        }

    }

    // 修改地址
    var yinc2 = document.getElementById('yinc2');
    function doshow_b(obj) {
        var addressName=$(obj).parent().parent().find('.addressName').html();
        var addressDetail=$(obj).parent().parent().find('.addressDetail').html();
        var addressNumber=$(obj).parent().parent().find('.addressNumber').html();
        $('#addressNameDiv').val(addressName);
        $('#addressNumberDiv').val(addressNumber);
        $('#addressDetailDiv').val(addressDetail);

        var id = $(obj).parent().prev('input').val();
        if (yinc2.style.display == 'none') {
            $.get('/Home/address/editIndex', {
                'id': id
            },
            function(data) {
                data = eval("(" + data + ")");
                var sel = data.pop();
                for (var i = 0; i < data.length; i++) {
                    var select = $("<select class='append w-select j-province'></select>");
                    var input = $("<input type='hidden' value=" + id + ">");
                    $('#editContainer').append(select);
                }
                var input = $("<input type='hidden' value=" + id + " class='addressEditId'>");
                $('#editContainer').append(input);
                $('#editContainer select').each(function(i) {
                    var option = '';
                    for (var j = 0; j < data[i].length; j++) {
                        option += "<option class='j-province' value=" + data[i][j]['id'] + ">" + data[i][j]['name'] + "</option>";
                    }
                    $(this).append(option);
                    $(this).val(sel[i]);
                });
                $('.append').removeClass('append');
            });
            yinc2.style.display = "block";
        } else {
            $('#editContainer').children().remove();
            yinc2.style.display = "none";
        }

    }

    $('#editContainer select').live('change',
    function() {
        var id = $(this).val();
        var aa = $(this);
        $.get('/Home/address/editCity', {
            'id': id
        },
        function(data) {
            aa.nextAll('select').remove();
            data = eval("(" + data + ")");
            for (var i = 0; i < data.length; i++) {
                var select = $("<select class='append w-select j-province'></select>");
                $('#editContainer').append(select);
            }
            $('.append').each(function(k) {
                var option = '';
                for (var j = 0; j < data[k].length; j++) {
                    option += "<option class='j-province' value=" + data[k][j]['id'] + ">" + data[k][j]['name'] + "</option>";
                }
                $(this).append(option);
            });
            $('.append').removeClass('append');
        });
    });

    $('#newContainer select').live('change',
    function() {
        var id = $(this).val();
        var aa = $(this);
        $.get('/Home/address/editCity', {
            'id': id
        },
        function(data) {
            aa.nextAll('select').remove();
            data = eval("(" + data + ")");
            for (var i = 0; i < data.length; i++) {
                var select = $("<select class='append w-select j-province'></select>");
                $('#newContainer').append(select);
            }
            $('.append').each(function(k) {
                var option = '';
                for (var j = 0; j < data[k].length; j++) {
                    option += "<option class='j-province' value=" + data[k][j]['id'] + ">" + data[k][j]['name'] + "</option>";
                }
                $(this).append(option);
            });
            $('.append').removeClass('append');
        });
    });

    $('.deleteAddress').click(function() {
        var id = $(this).parent().prev('input').val();
        if (confirm('确定要删除吗')) {
            $.get('/Home/address/delete', {
                'id': id
            },
            function(data) {
                if (data) {
                    location.reload();
                } else {
                    alert('删除失败');
                }
            });
        }

    });

    $('#btn1').click(function() {

        var $id = 7;
        // alert($id);
        var $add_detail = $('#xxdz').val();
        // alert($add_detail);
        var $add_name = $('input[name="add_name"]').val();
        // alert($add_name);
        var $add_number = $('input[name="add_number"]').val();
        // alert($add_number);
        var $add_default = $('input[name="dft"]').val();
        // alert($add_default);
        // 获取所选地址
        var address = Array();
        $('#newContainer select').each(function() {
            address[address.length] = $(this).val();
        });
        var $pro = address[0];
        var $cit = address[1];
        var $dis = address[2];
        var $str = address[3];

        $.ajax({
            url: '/Home/address/allInfo',
            type: 'get',
            async: true,
            data: {
                'id': $id,
                'add_detail': $add_detail,
                'add_name': $add_name,
                'add_number': $add_number,
                'add_default': $add_default,
                'add_1': $pro,
                'add_2': $cit,
                'add_3': $dis,
                'add_4': $str
            },
            // dataType:'json',
            success: function(data) {
                alert('添加地址成功');
                location.reload();
            },
            error: function() {
                alert('ajax请求失败');
            }
        });
    });

    $('#btn2').click(function() {

        var id = $(this).parent().parent().find('.addressEditId').val();
        var divContainer = $(this).parent().parent().parent().parent().parent();
        // 详细地址
        var addressDetail = divContainer.find('.addressDetail').val();
        // 收货人
        var receiver = divContainer.find('.receiver').val();
        // 电话
        var phoneNumber = divContainer.find('.phoneNumber').val();

        var address = Array();
        divContainer.find('select').each(function() {
            address[address.length] = $(this).val();
        });
        // console.log(address);
        var $pro = address[0];
        var $cit = address[1];
        var $dis = address[2];
        var $str = address[3];

        $.ajax({
            url: '/Home/address/allEdit',
            type: 'get',
            async: true,
            data: {
                'id': id,
                'add_detail': addressDetail,
                'add_name': receiver,
                'add_number': phoneNumber,
                'add_1': $pro,
                'add_2': $cit,
                'add_3': $dis,
                'add_4': $str
            },
            success: function(data) {
                alert('修改地址成功');
                location.reload();
            },
            error: function() {
                alert('ajax请求失败');
            }
        });
    });</script>