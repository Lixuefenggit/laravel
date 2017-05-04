<!--进度条-->
<!DOCTYPE html>
<html class="js rgba opacity cssanimations borderradius boxshadow csstransitions csstransforms textshadow"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>帐号安全 - 网易严选</title>
<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
        <style type="text/css">  
        #login  
        {  
            display:none;  
            border:2px solid #CCCCCC;  
            height:50%;  
            width:50%;  
            position:absolute;/*让节点脱离文档流,我的理解就是,从页面上浮出来,不再按照文档其它内容布局*/  
            top:24%;/*节点脱离了文档流,如果设置位置需要用top和left,right,bottom定位*/  
            left:24%;  
            z-index:2;/*个人理解为层级关系,由于这个节点要在顶部显示,所以这个值比其余节点的都大*/  
            background: white;  
        }  
        #over  
        {  
            width: 100%;  
            height: 100%;  
            opacity:0.8;/*设置背景色透明度,1为完全不透明,IE需要使用filter:alpha(opacity=80);*/  
            filter:alpha(opacity=80);  
            display: none;  
            position:absolute;  
            top:0;  
            left:0;  
            z-index:1;  
            background: silver;  
        }  
        </style> 
<meta name="keywords" content="网易严选,严选,电子商务,网购,居家,厨房,饮食,甄选家,有态度,一流制造商,匠心打造,源头把控,绿色,安全,舒适,健康,品质,严格甄选,出口品质">
<meta name="description" content="网易严选秉承网易一贯的严谨态度，深入世界各地，严格把关所有商品的产地、工艺、原材料，甄选居家、厨房、饮食等各类商品，力求给你最优质的商品。">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="shortcut icon" href="http://you.163.com/favicon.ico?r=gold" type="image/x-icon">
<meta property="qc:admins" content="365774662561636375">
<link rel="stylesheet" href="{{ asset('/Home/css/safety/style-f4405ccdca.css') }}" type="text/css">
<script type="text/javascript" async="" src="{{ asset('/Home/css/safety/j.htm') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/css/safety/456_audience.js') }}"></script><script type="text/javascript" async="" src="%E5%B8%90%E5%8F%B7%E5%AE%89%E5%85%A8%20-%20%E7%BD%91%E6%98%93%E4%B8%A5%E9%80%89_files/_aa_check_.htm"></script><script type="text/javascript" async="" src="{{ asset('/Home/css/safety/conversion.js') }}"></script><script type="text/javascript" async="" defer="defer" src="{{ asset('/Home/css/safety/456_main.js') }}"></script><script type="text/javascript">
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
</script> <link rel="stylesheet" href="{{ asset('/Home/css/safety/securityCenter-9f440d9643.css') }}">
</head>
<body>
<!-- 头部 -->

    @include('Home.header.header')

<div class="g-bd">
<div class="g-row">
<div class="g-sub">
<div class="m-userinfo">
<div class="w-avatar" id="j-sideAvatarWarp">
<img src="%E5%B8%90%E5%8F%B7%E5%AE%89%E5%85%A8%20-%20%E7%BD%91%E6%98%93%E4%B8%A5%E9%80%89_files/c3a03895c73694d922310c76e4915cdb.png" alt="头像" id="j-sideAvatar" width="100px" height="100px">
<div class="modifyAvatar w-icon-normal icon-normal-camera"></div>
<div class="mask"></div>
</div>
<div class="w-nickname" title="14900917" id="j-sideNickname">14900917</div>
<a class="w-levelname" href="http://you.163.com/membership/index" target="_blank">
<div class="logo hidden" id="j-logo"></div><span class="w-icon-member member-top-vip0" title="普通用户"></span><span class="levelname level-0">普通用户</span>
</a>
<a class="w-button switch" href="http://you.163.com/u/logout?callback=/u/loginurs">
切换帐号
</a>
</div>
<!-- 新人不展示邀请返利 -->
<script>
var membershipOn = false;
membershipOn = true;
</script>
<div class="m-menu">
<a href="http://you.163.com/user/info" class="w-menu-item ">个人信息</a>
<a href="http://you.163.com/order/myList" class="w-menu-item ">订单管理</a>
<a href="http://you.163.com/address/list" class="w-menu-item ">地址管理</a>
<a href="http://you.163.com/coupon" class="w-menu-item j-userCouponNum">优惠券（0）</a>
<a href="http://you.163.com/preemption/index" class="w-menu-item ">优先购</a>
<a href="http://you.163.com/user/giftCard" class="w-menu-item ">礼品卡</a>
<a href="http://you.163.com/item/userCollection" class="w-menu-item ">收藏夹</a>
<a href="http://you.163.com/user/securityCenter" class="w-menu-item active ">帐号安全</a>
<a href="http://you.163.com/expert/user?_stat_referer=myList" class="w-menu-item ">我的甄选家</a>
</div>
</div>
<div class="g-main">
<div class="m-securityCenter">
<div class="row curAccount">
<label class="col-1 f-left">您当前的帐号</label>
<span class="col-2 f-left">14900917@qq.com</span>
</div>
<div class="row">
<label class="col-1 f-left"><i class="w-icon-normal icon-normal-suc-s"></i>登录密码</label>
<span class="col-2 f-left f-txt-assist">建议您定期更换密码，设置安全性高的密码可以使帐号更安全</span>

<a class="w-link f-right" href="javascript:show()">修改密码</a>
                            <div id="login">
                                <a style="position: relative;top:5px;left:405px;color:#555555;" href="javascript:hide()">关闭</a>
                                <div style="position: relative;top:25px;left:110px;">
                                    <span style="color:#666666;font-size:15px">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="password" name="password" value="" placeholder="请输入新密码" style="border:1px solid #CCCCCC"></span>
                                    <br>
                                    <span style="color:#666666;font-size:15px;position: relative;top:10px;">确认密码&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="password" name="npassword" value="" placeholder="再次输入新密码" style="border:1px solid #CCCCCC"></span>
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="w-button switch" style="color:#555555;position: relative;top:30px;" type="submit" name="commit" id="btn" value="提交"></div></div>
                            <div id="over"></div>





</div>
<div class="row">
<label class="col-1 f-left"><i class="w-icon-normal icon-normal-alert"></i>绑定手机</label>
<span class="col-2 f-left f-txt-assist">绑定手机后，您可享受严选丰富的手机服务以及重要信息更改时的身份验证
</span>
<a href="http://you.163.com/user/securityCenter/bindMobile" class="w-link f-right">绑定</a>
</div>
<div class="row last">
<label class="col-1 f-left"><i class="w-icon-normal icon-normal-alert"></i>支付密码</label>
<span class="col-2 f-left f-txt-assist">支付密码启用后，将作为您帐号资产使用时的身份证明</span>
<a href="http://you.163.com/user/securityCenter/setPayPwd" class="w-link f-right">立即设置</a>
</div>
<div class="row securityTips " style="margin-top:0">
<div class="title">安全服务提示</div><p>• 确认您登录的是网易严选网址http://you.163.com,注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗</p><p>• 建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保帐号及交易安全</p>
</div>
</div>
</div>
</div>
</div>

<div id="js-fixedtool" class="m-fixedtool m-fixedtool-newuser" style="right: 276.5px; display: block;">
<!-- <div class="birthdayGift" id="j-birthdayGift">
</div> -->
<a class="activityEntry j-fixedToolActivity" data-id="1038000" target="_blank" href="http://you.163.com/act/pub/EjhGrgrZFE.html?_stat_area=fixedTool&amp;_stat_referer=index">
<img class="activityPic" src="%E5%B8%90%E5%8F%B7%E5%AE%89%E5%85%A8%20-%20%E7%BD%91%E6%98%93%E4%B8%A5%E9%80%89_files/6847032abb4a4e820a4816233845eab7.jpg">
</a>
<a class="newuser j-newuser" target="_blank" href="http://you.163.com/gift/newUserGift?_stat_referer=fixedtool" style="">
<i class="w-icon-fixedtool fixedtool-newuser"></i>
<p class="text">新人有礼</p>
</a>
<a class="download j-downloadlink" target="_blank" href="http://you.163.com/downloadapp?_stat_from=web_out_pz_baidu_1">
<i class="w-icon-phone phone-app"></i>
<p class="text">下载APP</p>
<div class="qrCode">
<i class="w-icon-arrow arrow-right-hollow-gray"></i>
<div class="img j-qrcode"><canvas width="75" height="75" style="width: 75px; height: 75px;"></canvas></div>
<span class="text">首单立减8元</span>
</div>
</a>
<div id="js-fixedtoolCustomerService" class="customerService">
<i class="w-icon-fixedtool fixedtool-customerService"></i>
<p class="text">在线客服</p>
</div>
<div id="js-fixedtoolGoTop" class="goTop">
<i class="w-icon-arrow arrow-up-hollow-white-s"></i>
<p class="text">回顶部</p>
</div>
</div>
<script src="{{ asset('/Home/css/safety/vender-09718b5911.js') }}"></script>
<script src="{{ asset('/Home/css/safety/common-3bc6a836f1.js') }}"></script>
<script src="{{ asset('/Home/css/safety/96ee78c0d9633761581e89d5019c5595.js') }}" defer="defer" async=""></script>

<script>
var step = 0;
var isBindMobile = false;
</script>
<script src="{{ asset('/Home/css/safety/securityCenter-19a12179ac.js') }}"></script><div style="top: 0px; left: 0px; visibility: hidden; position: absolute; width: 1px; height: 1px;"><iframe style="height:0px; width:0px;" src="%E5%B8%90%E5%8F%B7%E5%AE%89%E5%85%A8%20-%20%E7%BD%91%E6%98%93%E4%B8%A5%E9%80%89_files/delegate.htm"></iframe></div><div class="layer-3" id="YSF-BTN-HOLDER" style="display: none;"><div id="YSF-CUSTOM-ENTRY-3"><img src="%E5%B8%90%E5%8F%B7%E5%AE%89%E5%85%A8%20-%20%E7%BD%91%E6%98%93%E4%B8%A5%E9%80%89_files/3.png"></div><span id="YSF-BTN-CIRCLE"></span><div id="YSF-BTN-BUBBLE"><div id="YSF-BTN-CONTENT"></div><span id="YSF-BTN-ARROW"></span><span id="YSF-BTN-CLOSE"></span></div></div><div class="m-notify hide"><div class="text j-text"></div></div>
<script type="text/javascript">
var youdao_conv_id = 285846;
</script>
<script type="text/javascript" src="{{ asset('/Home/css/safety/conv.js') }}" async=""></script>


</body></html>
    <script type="text/javascript">  
    var login = document.getElementById('login');  
    var over = document.getElementById('over');  
        function show()  
        {  
            login.style.display = "block";  
            over.style.display = "block";  
        }  
        function hide()  
        {  
            login.style.display = "none";  
            over.style.display = "none";  
        }  
    </script>  

<script type="text/javascript">// alert(111);

    $('#btn').click(function() {
        var $password = $('input[name="password"]').val();
        var $npassword = $('input[name="npassword"]').val();
        if ($password == '' || $npassword == '') {
            alert('密码不能为空');
            return;
        }
        if ($password == $npassword) {

            $.ajax({
                url: '/Home/safety/password/edit',
                type: 'get',
                async: true,
                data: {
                    'uid': 1,
                    'password': $password
                },
                success: function(data) {
                    if (data) {
                        alert('修改成功');
                    } else {
                        alert('修改失败');
                    }

                },
                error: function() {
                    alert('请输入6到12位字符');
                }
            });
        } else {
            alert('输入不一致');
        }

    });</script>
