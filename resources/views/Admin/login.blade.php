<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>
            
        <!-- CSS -->
        <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/generics.css') }}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">
        <section id="login">
            <header>
                <h1>SUPER ADMIN</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            </header>
        
            <div class="clearfix"></div>
            
            <!-- Login -->
            <form class="box tile animated active" id="box-login" action='/admin/dologin' method='post'>
                {{ csrf_field() }}
                @if(session('msg'))
                    <h2 class="m-t-0 m-b-15">{{ session('msg') }}</h2>
                @else
                    <h2 class="m-t-0 m-b-15">Login</h2>
                @endif
                <input type="text" class="login-control m-b-10" placeholder="请输入帐号" name='username' value="{{old('username')}}">
                <input type="password" class="login-control" placeholder="请输入密码" name='password'
                value="{{old('password')}}">
                <br> <br>
                &nbsp;&nbsp;&nbsp;请输入验证码：
                <div class='row'>
                    <div class='col-xs-4'>
                        <input type='text' class='login-control m-b-5' name='mycode'>
                    </div>
                    <div class='col-xs-4'>
                        <img src="{{ url('/admin/captcha/'.time()) }}" onclick="this.src='{{ url('/admin/captcha') }}/'+Math.random()" />
                    </div>
                </div>


            <!--<div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox">
                        Remember Me
                    </label>
            </div> -->

                <button class="btn btn-sm m-r-5">登录</button>
                
           <!--      <small>
                    <a class="box-switcher" data-switch="box-register" href="">注册一个</a> |
                    <a class="box-switcher" data-switch="box-reset" href="">忘记密码</a>
                </small> -->
            </form>
            
 
        </section>                      
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{ asset('Admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>
        
        <!--  Form Related -->
        <script src="{{ asset('Admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->
        
        <!-- All JS functions -->
        <script src="{{ asset('Admin/js/functions.js') }}"></script>
    </body>
</html>

<script type="text/javascript">
        $('input[name="username"]').focus(function(){
            //把input后面的span提示删除
            $(this).prev('span').remove();
        }).blur(function(){

            //获取用户输入的用户名
            var v = $(this).val();
            // alert(v);
            $.ajax({
                url:'/admin/doAjax',
                type:'get',
                async:true,
                data:{username:v},
                dataType:'json',

                success:function(data)
                {

                    if(data){
                        $('<span style="color:green;font-size:16px;font-weight:bold;">此账号可用！！！</span>').insertBefore('input[name="username"]');
                    }else{
                        $('<span style="color:red;font-size:16px;font-weight:bold;">此账号不存在！！！</span>').insertBefore('input[name="username"]');
                    }
                },
                error:function()
                {
                    alert('ajax请求失败');
                }
            });

        });
</script>