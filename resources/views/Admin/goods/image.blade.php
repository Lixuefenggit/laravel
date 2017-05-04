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
        <link href="{{ asset('Admin/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
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
            
            <!-- 侧边栏 -->
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
        
            <!-- 内容主体 -->
            <section id="content" class="container">
                <div style="width:100%;height:500px;padding-top:30px;padding-left:100px;">
                    <form class="form-horizontal" action="/Admin/goods/add/image/{{ $id }}" method='post' enctype="multipart/form-data">  
                        {{ csrf_field() }}
                        <h2 style="margin-bottom:30px">请上传商品图片信息</h2>
                         <div class="form-group" id='goodsThumb'>
                            <label class="col-sm-1 control-label">缩略图：</label>
                            <div class="col-sm-9" style="border:1px solid #875A67;margin-left:7px">
                                <input type="file" style="float:left;margin-top:10px" class="goodsThumb" name="thumb[]">
                                <input type="file" style="float:left;margin-top:10px"  class="goodsThumb" name="thumb[]">
                                <input type="file" style="float:left;margin-top:10px"  class="goodsThumb" name="thumb[]">
                                <input type="file" style="float:left;margin-top:10px" class="goodsThumb" name="thumb[]"> 
                                <input type="file" style="float:left;margin-top:10px"  class="goodsThumb" name="thumb[]">
                            </div>
                        </div>
                        <div class="form-group" id="datailPic" style="margin-top:50px">
                            <label class="col-sm-1 control-label">详情图片：</label>
                            <div class="col-sm-9" style="border:1px solid #875A67;margin-left:7px">
                                <input type="file" style="float:left;margin-top:10px" class="goodsDetail" name="detail[]">
                                <input type="file" style="float:left;margin-top:10px" class="goodsDetail" name="detail[]">
                                <input type="file" style="float:left;margin-top:10px" class="goodsDetail" name="detail[]">
                                <input type="file" style="float:left;margin-top:10px" class="goodsDetail" name="detail[]">
                                <input type="file" style="float:left;margin-top:10px" class="goodsDetail" name="detail[]">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-block btn-alt" style="width:878px;margin-top:50px" value="上传">
                    </form>
                </div>
            </section>
        </section>
        
        <!-- Javascript Libraries -->

        <script src="{{ asset('Admin/js/jquery-1.8.3.min.js') }}"></script> <!-- jQuery Library -->

        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>

        <!-- UX -->

        <!-- Other -->
        <script src="{{ asset('Admin/js/calendar.min.js') }}"></script> <!-- Calendar -->
        
        <script src="{{ asset('Admin/js/scroll.min.js') }}"></script> 
        <!-- All JS functions -->
        <script src="{{ asset('Admin/js/calendar.min.js') }}"></script>
        <script src="{{ asset('Admin/js/functions.js') }}"></script>

    </body>

    <style>
        #conten-table,#conten-table th{
        	text-align: center;
        	height: 40px
        }
        #conten-table tr{
        	text-align: center;
        	height: 40px
        }
        .position{
            position: relative;
        }
        .btn-self{
            border: 0;color:#fff;background: rgba(0, 0, 0, 0) !important;border: 1px solid rgba(255, 255, 255, 0.31) !important;
        }
    </style>
</html>

<script>

</script>


