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
                <div style="width:100%;height:500px;padding-top:40px;padding-left:100px;">
               
                    <form class="form-horizontal">  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">商品名称：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="background:#E6E6E6" id="goodsName" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">所属类别：</label>
                            <label class="control-label" style="margin-left:10px">{{ $cate->name }}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">所属品牌：</label>
                            <label class="control-label" style="margin-left:10px">{{ $brand }}</label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">价格：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="background:#E6E6E6" id="goodsPrice"  value="{{ $data->price }}">
                            </div>
                        </div>
                        <div class="form-group" id="divSimDes">
                            <label class="col-sm-1 control-label">简要描述：</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="background:#E6E6E6" id="goodsSimDes"  value="{{ $data->sim_desc }}">
                            </div>
                        </div>
                       
                       <input type="hidden" value="{{ $data->id }}" id="hiddenId">

                       @for($i=0;$i<count($cateAttr);$i++)
                        <div class='form-group attrDes' data="{{ $cateAttr[$i] }}">
                            <label class='col-sm-1 control-label'>{{ $cateAttr[$i] }}属性：</label>
                            <div class='col-sm-9' style='border:1px solid #875A67;margin-left:7px'> 
                                @for($j=0;$j<count($attr[$cateAttr[$i]]);$j++)
                                    <label class='' style='margin-right:50px'>
                                        <input type='checkbox' value="{{ $attr[$cateAttr[$i]][$j] }}" class='attrTab'>{{ $attr[$cateAttr[$i]][$j] }}
                                    </label>
                                @endfor
                                <div>
                                    <button class='btn-self attrDel'>删除属性</button>
                                    <button class='btn-self attrAdd'>添加属性</button>
                                </div>
                            </div>
                        </div>
                        @endfor

                        <div id="piliangContainer">
                            <div style="width:270px;height:250px;border:1px solid #E5E5E5;background:white;color:black;display:none;position:absolute;left:-100px;top:20px;text-align:left;z-index:5;" class="piliangshezhi">
                                <p><b>批量设置</b></p>
                                <div style="width:250px;height:90px;margin-left:20px">
                                    <p>价格：</p>
                                    @for($i=0;$i<count($cateAttr);$i++)

                                    <label><input type='checkbox' value="{{ $cateAttr[$i] }}" option='price' class='priceCheckbox'>同{{ $cateAttr[$i] }}价格相同</label>

                                    @endfor
                                </div>
                                <div style="width:250px;height:80px;margin-left:20px">
                                    <p>库存：</p>

                                    @for($i=0;$i<count($cateAttr);$i++)

                                    <label><input type='checkbox' value="{{ $cateAttr[$i] }}" option='price' class='countCheckbox'>同{{ $cateAttr[$i] }}库存相同</label>

                                    @endfor
                                </div>
                                <button id='butYes' style="margin-left:80px;margin-top:10px">确定</button>
                                <button id='butNo'>取消</button>
                            </div>
                        </div>

						<input type="button" style="width:870px;height:40px; margin-top:20px;margin-left:80px;margin-bottom:100px;" class="btn-self" value="提交修改" id="selfSubmit">
                    </form>
                </div>
            </section>

            <span style="display:none" id="attrValueHid">{{ $attr_value }}</span>
            <input type="hidden" value="{{ $data->id }}">
        </section>
        
        <!-- Javascript Libraries -->

        <script src="{{ asset('Admin/js/jquery-1.8.3.min.js') }}"></script> <!-- jQuery Library -->

        <!-- Bootstrap -->
        <script src="{{ asset('Admin/js/bootstrap.min.js') }}"></script>
        
        <!-- 生成表格 -->
        <script src="{{ asset('Admin/goodsAdd/table.js') }}"></script>
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
    // 页面加载完成，生成表格
    var cateAttrValue=new Object();
    var cateAttr=new Array();
    $('.attrDes').each(function(){
        var name=$(this).attr('data');
        cateAttr[cateAttr.length]=name;
        var a=Array();
        $(this).find('input').each(function(){
            var len=a.length;
            a[len]=this.value;
        });
        cateAttrValue[name]=a;
    });
    $('#conten-table').remove();
    genHead(cateAttr);
    genBody(cateAttr,cateAttrValue);
    // 将规格数据塞入表格中
    var data=$('#attrValueHid').html();
    data = eval( "(" + data + ")" );
    doMatch();

    // 删除属性
    $('.attrDel').live('click',function(){
        // 处理批量处理框
        $('.piliangshezhi').css('display','none').appendTo($('#piliangContainer'));
        // 删除属性前保存原来的规格数据
        data=getData()
        // 获取选中的要删除的属性
        $(this).parent().siblings('label').children('input').filter(':checked').parent().remove();

        var cateAttrValue=new Object();
        var cateAttr=new Array();
        $('.attrDes').each(function(){
            var name=$(this).attr('data');
            cateAttr[cateAttr.length]=name;
            var a=Array();
            $(this).find('input').each(function(){
                var len=a.length;
                a[len]=this.value;
            });
            cateAttrValue[name]=a;
        });
        $('#conten-table').remove();
        genHead(cateAttr);
        genBody(cateAttr,cateAttrValue);
        // 新表格生成之后进行匹配
        doMatch(data);
        return false;
    });

    // 添加属性
    $('.attrAdd').live('click',function(){
        // 处理批量处理框
        $('.piliangshezhi').css('display','none').appendTo($('#piliangContainer'));
        // 添加属性前保存原来的规格数据
        data=getData()

        var content=prompt('请输入属性名,一次只能输入一个');
        var label=$("<label class='' style='margin-right:50px'><input type='checkbox' value="+content+" class='attrTab'>"+content+"</label>");
        if(content){
            $(this).parent().before(label);
        }

        var cateAttrValue=new Object();
        var cateAttr=new Array();
        $('.attrDes').each(function(){
            var name=$(this).attr('data');
            cateAttr[cateAttr.length]=name;
            var a=Array();
            $(this).find('input').each(function(){
                var len=a.length;
                a[len]=this.value;
            });
            cateAttrValue[name]=a;
        });
        $('#conten-table').remove();
        genHead(cateAttr);
        genBody(cateAttr,cateAttrValue);

        // 新表格生成之后进行匹配
        doMatch(data);

        return false;
    });

    // 添加或删除属性之前保存数据
    function getData()
    {
        // 添加属性前获取已经填写的数据
        var data=Array();
        var temRow=document.getElementById('conten-table').rows;
        for(var i=1;i<temRow.length;i++){
            var temData=Array();
            var temCell=temRow[i].cells;
            for(var j=0;j<temCell.length-1;j++){
                if(j>temCell.length-4){
                    temData[temData.length]=temCell[j].firstChild.value;
                }else{
                    temData[temData.length]=temCell[j].innerHTML;
                }
            }
            data[data.length]=temData;
        }
        return data;
    }

    // 新表格生成之后进行匹配
    function doMatch()
    {
        // 重新生成表格后获取新表格单元格数组
        var tableNew=Array();
        var temNew=document.getElementById('conten-table').rows;
        for(var m=1;m<temNew.length;m++){
            var temTableData=Array();
            var temNewCell=temNew[m].cells;
            for(var n=0;n<temNewCell.length-3;n++){
                temTableData[temTableData.length]=temNewCell[n].innerHTML;
            }
            tableNew[tableNew.length]=temTableData;
        }

        // 先遍历新表格的行
        rows=document.getElementById('conten-table').rows;
        var lev=null;
        for(var k=0;k<tableNew.length;k++){
            // 遍历已存数据的行
            for(var z=0;z<data.length;z++){
                // 遍历新表格的列
                for(var x=0;x<tableNew[k].length;x++){
                    if(tableNew[k][x]!=data[z][x]){
                        lev=null;
                        // 只要有一列不等，进入下一行进行循环，本行舍弃
                        break;
                    }else{
                        lev=z;
                    }
                }
                if(lev!=null){
                    // 当所有列都循环完lev的值还没有变成null的时候说明本行完全匹配
                    break;
                }
            }
            if(lev!=null){
                // 当内部循环完之后lev的值还没有编程null的时候说明匹配成功
                // alert(data[z][0]);
                temLength=rows[0].cells.length;
                rows[k+1].cells[temLength-3].firstChild.value=data[lev][temLength-3]; 
                rows[k+1].cells[temLength-2].firstChild.value=data[lev][temLength-2]; 
            }
        }
    }

    // 显示批量处理框
    function piliang(obj)
    {
        $(obj).addClass('position').append($('.piliangshezhi'));
        $('.piliangshezhi').css('display','block');
    }

    // 隐藏批量处理框
    $('#butNo').on('click', function(){
        $(this).parents('.piliangshezhi').css('display','none').appendTo($('#piliangContainer'));
        return false;
    });

    // 判断一个字符串是否数组的成员
    function isMember(str,arr)
    {
        for(var k=0;k<arr.length;k++){
            if(str==arr[k]){
                return true;
            }
        }
        return false;
    }


    // 点击确定之后批量处理逻辑
    $('#butYes').on('click',function(){
         // 选中的行的价格
        var price=$(this).parent().parent().parent().parent().find('.priceInput').val();
        // 选中的行的库存
        var count=$(this).parent().parent().parent().parent().find('.countInput').val();

        // 将价格相同的属性压入数组
        var priceSel=Array();
        var priceNum=Array()
        $('.priceCheckbox').each(function(i){
            priceSel[priceSel.length]=$(this).parent().parent().parent().parent().parent().parent().children().eq(i).html();
            if($(this).attr('checked')=='checked'){
                priceNum[priceNum.length]=i;
            }
        });

        console.log(priceSel);

        // 将库存相同的属性压入数组
        var countSel=Array();
        var countNum=Array();
        $('.countCheckbox').each(function(i){
            countSel[countSel.length]=$(this).parent().parent().parent().parent().parent().parent().children().eq(i).html();
            if($(this).attr('checked')=='checked'){
                countNum[countNum.length]=i;
            }
        });

        // 属性数量
        size=$('.countCheckbox').size();
        var rows=document.getElementById('conten-table').rows;
        for(var i=1;i<rows.length;i++){
            var cell=rows[i].cells;
            for(var j=0;j<size;j++){
                // 处理价格相同
                if(isMember(j,priceNum)){
                    if(cell[j].innerHTML==priceSel[j]){
                        cell[cell.length-3].firstChild.value=price;
                    }
                }
                // 处理库存相同
                if(isMember(j,countNum)){
                    if(cell[j].innerHTML==countSel[j]){
                        cell[cell.length-2].firstChild.value=count;
                    }
                }
            }
        }

        return false;
    });

    // 点击提交之后的逻辑处理
    $('#selfSubmit').click(function(){
        var id=$('#hiddenId').val();
        // 获取商品名称
        var goodsName=$('#goodsName').val();
        // 获取商品价格
        var goodsPrice=$('#goodsPrice').val();
        // 获取商品简要描述
        var goodsSimDes=$('#goodsSimDes').val();

        // 获取所有属性
        var allAttr=new Object();
        $('.attrDes').each(function(){
            var attrName=$(this).attr('data');
            var attr=Array();
            $(this).find('.attrTab').each(function(){
                attr[attr.length]=$(this).val();
            });
            allAttr[attrName]=attr;
        });
        // 得到所有属性   {"颜色":["黄色","绿色"],"尺寸":["170"]}
        allAttr=JSON.stringify(allAttr);

        // 获取表格里的所有规格数据并格式化成json字符串
        data=getData();
        data=JSON.stringify(data);

        // 所有数据取完。提交数据
        $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
        $.post('/Admin/goods/edit/'+id,{"name":goodsName,"price":goodsPrice,"sim_desc":goodsSimDes,'attr':allAttr,'attr_value':data},function(result){
            if(result){
                alert('修改成功');
            }else{
                alert('修改失败');
            }
        });
    });


</script>


