<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>网易严选后台管理</title>
            
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
            <a class="logo pull-left" href=""></a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <span style='font-size:30px;'>网易严选后台管理</span>
                    <span style='font-size:15px;'>欢迎使用严选后台管理</span>

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
                            <li><a href="{{ url('/admin/register') }}">添加注册管理员</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>

                          <!--   <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li> -->
                            <li><a href="{{ url('/admin/over') }}">退出登录</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">{{ session('adminuser')->username }}</h4>
                        
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           News Feeds
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                            Projects on going
                        </h2>
                        
                        <div class="s-widget-body">
                            <div class="side-border">
                                <small>Joomla Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="progress-bar tooltips progress-bar-danger" style="width: 60%;" data-original-title="60%">
                                          <span class="sr-only">60% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Opencart E-Commerce Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-info" style="width: 43%;" data-original-title="43%">
                                          <span class="sr-only">43% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Social Media API</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-warning" style="width: 81%;" data-original-title="81%">
                                          <span class="sr-only">81% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>VB.Net Software Package</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 10%;" data-original-title="10%">
                                          <span class="sr-only">10% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Chrome Extension</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 95%;" data-original-title="95%">
                                          <span class="sr-only">95% Complete</span>
                                     </a>
                                </div>
                            </div>
                        </div>
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
                @yield('content')
            </section>

        
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{ asset('Admin/js/jquery.min.js') }}"></script><!-- jQuery Library -->
        @yield('js')
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
    </body>
</html>


<!--后引用的表单里的JS开始-->
        
        <!--  Form Related -->
        <script src="{{ asset('Admin/js/validation/validate.min.js') }}"></script> <!-- jQuery Form Validation Library -->
        <script src="{{ asset('Admin/js/validation/validationEngine.min.js') }}"></script> <!-- jQuery Form Validation Library - requirred with above js -->
        <script src="{{ asset('Admin/js/select.min.js') }}"></script> <!-- Custom Select -->
        <script src="{{ asset('Admin/js/chosen.min.js') }}"></script> <!-- Custom Multi Select -->
        <script src="{{ asset('Admin/js/datetimepicker.min.js') }}"></script> <!-- Date & Time Picker -->
        <script src="{{ asset('Admin/js/colorpicker.min.js') }}"></script> <!-- Color Picker -->
        <script src="{{ asset('Admin/js/autosize.min.js') }}"></script> <!-- Textare autosize -->
        <script src="{{ asset('Admin/js/toggler.min.js') }}"></script> <!-- Toggler -->
        <script src="{{ asset('Admin/js/input-mask.min.js') }}"></script> <!-- Input Mask -->
        <script src="{{ asset('Admin/js/spinner.min.js') }}"></script> <!-- Spinner -->
        <script src="{{ asset('Admin/js/slider.min.js') }}"></script> <!-- Input Slider -->
        <script src="{{ asset('Admin/js/fileupload.min.js') }}"></script> <!-- File Upload -->
        
        <!-- Text Editor -->
        <script src="{{ asset('Admin/js/editor2.min.js') }}"></script> <!-- WYSIWYG Editor -->
        <script src="{{ asset('Admin/js/markdown.min.js') }}"></script> <!-- Markdown Editor -->
        
        <script src="calendar.js" type="text/javascript" language="javascript"></script>  

        <script type="text/javascript">
            $(document).ready(function(){
                /* Tag Select */
                (function(){
                    /* Limited */
                    $(".tag-select-limited").chosen({
                        max_selected_options: 5
                    });
                    
                    /* Overflow */
                    $('.overflow').niceScroll();
                })();
                
                /* Input Masking - you can include your own way */
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
                
                /* Spinners */
                (function(){
                    //Basic
                    $('.spinner-1').spinedit();
                    
                    //Set Value
                    $('.spinner-2').spinedit('setValue', 100);
                    
                    //Set Minimum                    
                    $('.spinner-3').spinedit('setMinimum', -10);
                    
                    //Set Maximum                    
                    $('.spinner-4').spinedit('setMaxmum', 100);
                    
                    //Set Step
                    $('.spinner-5').spinedit('setStep', 10);
                    
                    //Set Number Of Decimals
                    $('.spinner-6').spinedit('setNumberOfDecimals', 2);
                })();
            });
        </script>        
<!--后引用的表单里的JS结束-->   
