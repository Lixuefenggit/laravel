<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>后台管理</title>
            
        <!-- CSS -->
        <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/generics.css') }}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="/Admin/index">后台管理</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">   
                    </div>
                    <div class="pull-left tm-icon">  
                    </div>
                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="{{ asset('Admin/img/profile-pic.jpg') }}" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">消息</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">设置</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="{{ url('admin/over') }}">登出</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">超级管理员</h4>
                       
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="active">
                        <a class="sa-side-home" href="/admin/index">
                            <span class="menu-item">后台首页</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="/admin/advice">
                            <span class="menu-item">意见管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/advice">意见管理</a></li>
                        </ul>
                    </li>



                    <li class="dropdown">
                        <a class="sa-side-form">
                            <span class="menu-item">品牌管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="{{ url('/Admin/brand') }}">显示品牌信息</a></li>
                            <li><a href="{{ url('/Admin/brand/create') }}">添加品牌</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form">
                            <span class="menu-item">栏目管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="{{ url('/Admin/column') }}">显示栏目信息</a></li>
                            <li><a href="{{ url('/Admin/column/create') }}">添加栏目</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">用户管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a class="" href="/Htgl_user">用户信息</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">专题管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a class="" href="/Htgl_special">导航管理</a></li>
                            <li><a class="" href="/Htgl_article">文章管理</a></li>
                            <li><a class="" href="/Htgl_hosspecial">热门管理</a></li>
                        </ul> 
                    </li>


                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">链接管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/Admin/links/index">显示链接信息</a></li>
                            <li><a href="/Admin/links/add">添加链接</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">商品管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/Admin/goods">显示商品信息</a></li>
                            <li><a href="/Admin/goods/add">添加商品</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">关键词管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/Admin/keywords/index">显示关键词</a></li>
                            <li><a href="/Admin/keywords/add">添加关键词</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">管理员</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/Admin/auth/user">用户管理</a></li>
                            <li><a href="/Admin/auth/role">角色管理</a></li>
                            <li><a href="/Admin/auth">权限管理</a></li>
                        </ul>
                    </li>
                </ul>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
                    <!-- Text Input -->
                    <div class="block-area" id="text-input">
                        <h3 class="block-title">修改用户信息</h3>
                        
                        <div class="row">
                                {{ csrf_field() }}
                                <div class="col-lg-4 dividi">
                                    <span>用户名：</span>
                                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='username' value="{{ $ob->username }}">
                                    <span>角色：</span>
                                    @foreach($roles as $roles)
                                    <label class="checkbox-inline">
                                        <input class="userCheckbox" type="checkbox" @if(in_array($roles->name,$ob->role)) checked @endif><span>{{$roles->name}}</span>
                                    </label>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <input type='button' class="btn btn-block btn-alt" value='提交' id="submitButton">
                                </div>
                        </div>
                        <p></p>
                        
                    </div>




            </section>

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="{{ asset('Admin/img/browsers/chrome.png') }}" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="{{ asset('Admin/img/browsers/firefox.png') }}" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="{{ asset('Admin/img/browsers/opera.png') }}" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="{{ asset('Admin/img/browsers/safari.png') }}" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="{{ asset('Admin/img/browsers/ie.png') }}" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->

       <script src="{{ asset('Admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->
        <script src="{{ asset('Admin/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
        <script src="{{ asset('Admin/js/jquery.easing.1.3.js') }}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>

        <!-- Charts -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.js') }}"></script> <!-- Flot Main -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.time.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.animator.min.js') }}"></script> <!-- Flot sub -->
        <script src="{{ asset('Admin/js/charts/jquery.flot.resize.min.js') }}"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="{{ asset('Admin/js/sparkline.min.js') }}"></script> <!-- Sparkline - Tiny charts -->
        <script src="{{ asset('Admin/js/easypiechart.js') }}"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="{{ asset('Admin/js/charts.js') }}"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="{{ asset('Admin/js/maps/jvectormap.min.js') }}"></script> <!-- jVectorMap main library -->
        <script src="{{ asset('Admin/js/maps/usa.js') }}"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="{{ asset('Admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="{{ asset('Admin/js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="{{ asset('Admin/js/calendar.min.js') }}"></script> <!-- Calendar -->
        <script src="{{ asset('Admin/js/feeds.min.js') }}"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="{{ asset('Admin/js/functions.js') }}"></script>

        <style>
        .userCheckbox{
            position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;
        }
        </style>

        <script>
            // csrf验证
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            // 点击提交按钮将修改进行ajax提交
            $('#submitButton').click(function(){
                $('#submitButton').attr('disabled',1);
                var roles='';
                $('.userCheckbox:checked').each(function(){
                    roles +=this.parentNode.nextSibling.innerHTML+',';
                });
                roles=roles.substring(0,roles.length-1);
                $.ajax({url:'/Admin/auth/user/edit',
                    type:'post',
                    data:{'id':{{$id}},"name":$("input[name='username']").val(),"roles":roles},
                    success:function(data){
                        if(data==1){
                            // 后台返回1表示修改成功
                            alert('修改成功');
                            window.location.href="/Admin/auth/user";
                        }
                        if(data==2){
                            // 后台返回2表示修改失败
                            alert('修改失败');
                            $('#submitButton').attr('disabled',false);
                        }
                    },
                });
            });
        </script>
    </body>
</html>



