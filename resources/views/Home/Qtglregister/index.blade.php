﻿<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>严选注册</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Home/mjc/yanxuanmoban/css/index.css') }}">
        <link href="{{ asset('Home/mjc/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Home/mjc/bootstrap/css/generics.css') }}" rel="stylesheet"> 
<style type="text/css">
    html,body,h1,h2,h3,h4,h5,h6,div,dl,dt,dd,ul,ol,li,p,blockquote,pre,hr,figure,table,caption,th,td,form,fieldset,legend,input,button,textarea,menu{margin:0;padding:0;outline:none;}
header,footer,section,article,aside,nav,hgroup,address,figure,figcaption,menu,details{display:block;}
table{border-collapse:collapse;border-spacing:0;}
caption,th{text-align:left;font-weight:normal;}
html,body,fieldset,img,iframe,abbr{border:0;}
i,cite,em,var,address,dfn{font-style:normal;}
[hidefocus],summary{outline:0;}
li{list-style:none;}
h1,h2,h3,h4,h5,h6,small{font-size:100%;}
sup,sub{font-size:83%;}
pre,code,kbd,samp{font-family:inherit;}
q:before,q:after{content:none;}
textarea{overflow:auto;resize:none;}
label,summary{cursor:default;}
a,button{cursor:pointer;}
h1,h2,h3,h4,h5,h6,em,strong,b{font-weight:normal;}
del,ins,u,s,a,a:hover,a:active,a:focus{text-decoration:none;outline:none;}
body,textarea,input,button,select,keygen,legend{font:12px/1.14 "Microsoft YaHei","微软雅黑","宋体",helvetica,"Hiragino Sans GB";color:green;outline:0;}
body{cursor:default;}
input::-ms-clear,input::-ms-reveal{display:none;}
a{color:#666;}
button{border:0;}
html,body{width:100%;height:auto;margin:0;padding:0;background:none;font-family:"Microsoft YaHei","微软雅黑";}
input{width:225px;height:30px;padding-left:0;color:#333;border:none;font-size:16px;font-weight:bold;line-height:30px;*border:0;}
input::-webkit-input-placeholder{font-weight:normal;color:#bdbdbd;}
input::-moz-placeholder{font-weight:normal;color:#bdbdbd;}
input:-ms-input-placeholder{font-weight:normal;color:#bdbdbd;}
input:-moz-placeholder{font-weight:normal;color:#bdbdbd;}
input:-webkit-autofill,textarea:-webkit-autofill,select:-webkit-autofill{-webkit-box-shadow:0 0 0 999px #fff inset;}
input::-ms-clear{display:none;}
input::-ms-reveal{display:none;}
input:focus{border:none;outline:none;*border:0;*outline:0;}
a,a:active,a:hover,a:visited{text-decoration:none;}
body{background-color:#efefef;}
*{font-family:"Microsoft YaHei","微软雅黑","宋体",helvetica,"Hiragino Sans GB";}
.g-hd{height:130px;}
.clearfix:after{content:".";display:block;clear:both;height:0;overflow:hidden;visibility:hidden;}
.top_tlt{padding:44px 0 0 70px;font:normal 24px "Microsoft YaHei","微软雅黑","宋体",helvetica,"Hiragino Sans GB";color:#ca5252;}
.g-bd{position:relative;width:1000px;padding-bottom:55px;margin:0 auto;background-color:#fff;border-radius:6px;box-shadow:0 3px 3px #cbc9c9;}
.g-in{width:1000px;margin:0 auto;}
.f-dn{display:none;}
.spritebg{background:url("{{ asset('Home/mjc/yanxuanmoban/images/sprite.png') }}") no-repeat;_background-image:url("{{ asset('Home/mjc/yanxuanmoban/mages/sprite2.png') }}");}
.m-tr-block{float:right;font-size:18px;margin-top:50px;}
.m-tr-block a{text-decoration:none;color:#ca5252;}
.m-tr-block a:hover{color:#ad4747;}
.m-cp{padding:30px 0;}
.m-cp p,.m-cp p a{color:#b1b1b1;}
.m-cp p{padding-bottom:10px;text-align:center;}
.m-cp p a{padding:0 6px;}
.m-cp p a:hover{color:#ee8c18;}
</style>
</head>
<body>
  <div class="g-hd">
  	<div class="g-in">
        <a href="#" ><div class="m-logo spritebg"></div></a>
        <div class="m-tr-block">已有帐号？去<a href="/Home/Qtgluser">登录</a></div>
		
    </div>
  </div>

<div id="reg_block" class="g-bd">
	<div class="top_tlt">注册帐号</div>    
     <div style="width:460px;height:550px;background:#fff;margin:auto;">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif       
            @if(session('msg'))
                <div class="alert alert-success alert-icon">
                {{ session('msg') }}
                <i class="icon"></i>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-warning alert-icon">
                {{ session('error') }}
                <i class="icon"></i>
                </div>
            @endif 





                    <form role="form" class="form-validation-2" action='/Home/Qtglregister' method='post'>
                    {{ csrf_field() }}
                        <input name="level" type="hidden" value="普通">
                        <div class="form-group">
                            <label>用户名:</label>
                            <input name="name" style="color:blue;height:30px" class="form-control input-sm validate[required,custom[onlyLetterNumber]]" placeholder="请输入8-20位的数字或字母组成的用户名" type="text">
                        </div>
                        
                        <div class="form-group">           
                                <label>密码:</label>
                                <input style="color:blue;height:30px" class="input-sm validate[required] form-control" name="password" id="password" placeholder="请输入8-20位密码" type="password">
                          </div>                            
                          <div class="form-group">  
                                <label>确认密码:</label>
                                <input style="color:blue;height:30px" class="input-sm validate[required,equals[password]] form-control" placeholder="请确认8-20位密码" type="password">
                         </div>

                        <div class="form-group">
                            <label>年龄:</label>
                            <input name="age" style="color:blue;height:30px" class="form-control input-sm validate[required,custom[onlyNumberSp]]" placeholder="请输入0-120岁年龄" type="text">
                        </div>

                        <div class="form-group">
                            <label>
                                手机号:
                            </label>
                            <input name="phone" style="color:blue;height:30px" class="input-sm validate[required,custom[phone]] form-control" placeholder="请输入11位手机号" type="text" id="phoneNumber">
                        </div>                        
						
						<div class="form-group">
                            <p style="font-size:14px;margin-bottom:4px">验证码:</p>
                            <input name="phoneCode" style="color:blue;height:30px;border:1px solid #C9C9F7;background:#F3F3F3;width:380px" class="input-sm validate[required]" placeholder="请输入验证码" type="text">
                            <button style="height:30px;width:76px;background:#C6E3F9;font-size:14px" id="getCode">获取验证码</button>
                        </div> 

                        <div class="form-group">
                            <label>邮箱:</label>
                            <input name="eamil" style="color:blue;height:30px" class="form-control input-sm validate[required,custom[email]]" placeholder="请输入正确邮箱" type="text">
                        </div>                                                
                        
                        <div class="form-group">
                            <label>出生日期</label>
                            <input name="dateofbirth" style="color:blue;height:30px" class="form-control input-sm validate[required,custom[date]]" placeholder="请输入出生日期(例如2000-01-01)" type="text">
                        </div>

                        <br>&nbsp<input class="btn btn-sm" value="注册" type="submit">
                        <input class="btn btn-sm" value="重置" type="reset">

                    </form>



                </div>                 
  </div>

    <div class="g-in">
      <div class="m-cp">
        <p><a href="#">About NetEase</a>
		   <a href="#">公司简介</a>
		   <a href="#">联系方式</a>
		   <a href="#">OAuth2.0认证</a>
		   <a href="#">招聘信息</a>
		   <a href="#">客户服务</a>
		   <a href="#">相关法律</a>
		   <a href="#">网络营销</a></p>
        <p>兄弟连版权所有 ©2017-2017</p>
      </div>
    </div>

</body>
</html>
        <script src="{{ asset('Home/mjc/bootstrap/js/jquery.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/jquery.easing.1.3.js') }}"></script>

        
        <script src="{{ asset('Home/mjc/bootstrap/js/bootstrap.min.js') }}"></script>

        
        <script src="{{ asset('Home/mjc/bootstrap/js/charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/charts/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/charts/jquery.flot.animator.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/charts/jquery.flot.resize.min.js') }}"></script>

        <script src="{{ asset('Home/mjc/bootstrap/js/sparkline.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/easypiechart.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/charts.js') }}"></script> 

        
        <script src="{{ asset('Home/mjc/bootstrap/js/maps/jvectormap.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/maps/usa.js') }}"></script>

        
        <script src="{{ asset('Home/mjc/bootstrap/js/icheck.js') }}"></script>

        
        <script src="{{ asset('Home/mjc/bootstrap/js/scroll.min.js') }}"></script> 

        
        <script src="{{ asset('Home/mjc/bootstrap/js/calendar.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/feeds.min.js') }}"></script> 
        

        
        <script src="{{ asset('Home/mjc/bootstrap/js/functions.js') }}"></script>

        
        
        <script src="{{ asset('Home/mjc/bootstrap/js/validation/validate.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/validation/validationEngine.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/select.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/chosen.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/datetimepicker.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/colorpicker.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/autosize.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/toggler.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/input-mask.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/spinner.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/slider.min.js') }}"></script> 
        <script src="{{ asset('Home/mjc/bootstrap/js/fileupload.min.js') }}"></script>
        
        <script src="{{ asset('Home/mjc/bootstrap/js/editor2.min.js') }}"></script>
        <script src="{{ asset('Home/mjc/bootstrap/js/markdown.min.js') }}"></script>
        
        <script src="calendar.js" type="text/javascript" language="javascript"></script>  

        <script type="text/javascript">
            $(document).ready(function(){
                
                (function(){
                    $(".tag-select-limited").chosen({
                        max_selected_options: 5
                    });
                    $('.overflow').niceScroll();
                })();
                
                
                (function(){
                    $('.mask-date').mask('00/00/0000');
                    $('.mask-time').mask('00:00:00');
                    $('.mask-date_time').mask('00/00/0000 00:00:00');
                    $('.mask-cep').mask('00000-000');
                    $('.mask-phone').mask('0000-0000');
                    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
                    $('.mask-phone_us').mask('(000) 000-0000');
                    $('.mask-mixed').mask('AAA 000-S0S');
                    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
                    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
                    $('.mask-money2').mask("#.##0,00", {reverse: true, maxlength: false});
                    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
                    $('.mask-ip_address').mask('099.099.099.099');
                    $('.mask-percent').mask('##0,00%', {reverse: true});
                    $('.mask-credit_card').mask('0000 0000 0000 0000');
                })();
                
                
                (function(){
                    $('.spinner-1').spinedit();
                    $('.spinner-2').spinedit('setValue', 100);
                    $('.spinner-3').spinedit('setMinimum', -10);
                    $('.spinner-4').spinedit('setMaxmum', 100);
                    $('.spinner-5').spinedit('setStep', 10);
                    $('.spinner-6').spinedit('setNumberOfDecimals', 2);
                })();
            });
            

            // 发送验证码之后倒计时
            $('#getCode').click(function(){
                if($("#phoneNumber").val()==""){
                    alert('手机号不能为空');
                    return false;
                }
                if(!$("#phoneNumber").val().match(/^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/)){
                    alert('手机号格式不正确');
                    return false;
                }

                $.ajax({
                    'url':'/Home/register/getcode/'+$('#phoneNumber').val(),
                    'success':function(data){
                        if(data){
                            RemainTime();
                            $.get('/Home/register/deletecode',function(){
                                return false;
                            });
                            return false;
                        }else{
                           alert('获取失败，请更换号码或稍后重试');
                           return false; 
                        }
                       
                    },
                    'error':function(){
                        alert('获取失败，请更换号码或稍后重试');
                        return false;
                    }
                });
            });
            var iTime = 59;
            var Account;

            function RemainTime(){   
                $('#getCode').attr('disabled',true);
                var iSecond,sSecond="",sTime="";
                if (iTime >= 0){
                    iSecond = parseInt(iTime%60);
                    iMinute = parseInt(iTime/60)
                    if (iSecond >= 0){
                        if(iMinute>0){
                            sSecond = iMinute + "分" + iSecond + "秒";
                        }else{
                            sSecond = iSecond + "秒";
                        }
                    }
                    sTime=sSecond;
                    if(iTime==0){
                        clearTimeout(Account);
                        sTime='获取验证码';
                        iTime = 59;
                        $('#getCode').attr('disabled',false);
                    }else{
                        Account = setTimeout("RemainTime()",1000);
                        iTime=iTime-1;
                    }
                }else{
                    sTime='没有倒计时';
                }
                $('#getCode').html(sTime);
            }   
        </script>