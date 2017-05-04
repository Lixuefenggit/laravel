@extends('Admin.base.parent')

@section('content') 



<div class="block-area" id="tableStriped">



    <h3 class="block-title" style='font-size:20px;'>用户意见征集</h3>
    <br><br>
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

    <form action='/admin/uAdvice/{{ $tid }}' method='get'>
                <div class='medio-body'>
                    用户名：<input type='text' class='form-control input-sm m-b-10' name='name'>
                </div>
                <input type='submit' class='btn' value='搜索'>
    </form>

    <br>
    <!-- <h3 class="block-title">您的相关信息</h3> -->
    <div class="table-responsive overflow" style="overflow: hidden;" tabindex="5005">
        <table class="table table-bordered table-hover tile" style='font-size:15px;'>
            <thead>

                @if (session('info'))
                    <script>
                        alert("{{ session('info') }}");
                    </script>
                @endif

                <thead>
                    <tr>

                        <th>编号</th>
                        <th>用户名</th>
                        <th>建议内容</th>
                        <th>发表时间</th>
                        <th>热度</th>
                        <th colspan="3" align="right">建议管理</th>

                    </tr>
                </thead>
                <tbody>

                    <!-- 删除表单 -->
                    <form style='display:none' action='' method='post' name='delete'>
                        {{ csrf_field() }}
                        <input type="hidden" value='0' name='del'>
                    </form>               


                    <!-- 最新和热度排序表单 -->
                    <form style='display:none' action='' method='post' name='new1'>
                        {{ csrf_field() }}
                        <input type="hidden" value='1' name='new2'>
                    </form>


                    <!-- 添加修改大DIV -->
                    <div class="block-area" id="custom" style="padding: 0px 0px 0;">
                                                    <!-- 添加链接 -->
                     <p><a data-toggle="modal" href="#form-modal" style="font-size:20px;">用户建议浏览</a></p>


                     <div> 
                            <ul style=" float:left;
                                position:relative;
                                left:0px;
                                top:0px;
                                font-size:14px;
                                color:#333333;
                                padding-left:185px;
                                padding-right:40px;
                                list-style:none;
                                "
                            >
                                <li style="float:left;
                                    position:relative;
                                    left:62px;
                                    top:0px;"
                                >
                                    <a href="javascript:doNew1({{ $tid }})" style="font-size:15px;color:#4DB4ED">[最新建议]</a>
                                </li>

                                <li style="float:left;
                                    position:relative;
                                    left:168px;
                                    top:0px;"
                                >
                                    <a href="javascript:doHeat({{ $tid }})" style="font-size:15px;color:#4DB4ED">[最热建议]</a>
                                </li>
                                
                            </ul> 
                     </div>

                    
                    @foreach ($list as $v)
                     <tr id="list">
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->content }}</td>
                            <td>{{ $v->time }}</td>
                            <td>{{ $v->heat }}</td>

                            <td ><a href="javascript:doDel('{{ $v->id }}','{{ $tid }}')"><span style="color:#4DB4ED">删除</span></a></td>
                     </tr>
                     @endforeach
                                    
            </tbody>
        </table>
    </div>
        {{ $list->appends($where)->links() }}
</div>
<br><br><br>
@endsection
@section('js')
<script type="text/javascript">
    function doDel(id,tid)
    {
        if(confirm("你确定要删除吗？")){
            var form = document.delete;
            form.action = '/admin/uAdvice/delete/'+tid;
            form.del.value = id;
            form.submit();
        }
    }    

    // 最新查询
    function doNew1(tid)
    {
            var form = document.new1;
            form.action = '/admin/uAdvice/'+tid;
            form.new2.name = 'new2';
            form.submit();
    }      

    // 最热查询
    function doHeat(tid)
    {       
        var form = document.new1;
        form.action = '/admin/uAdvice/'+tid;
        form.new2.name = 'heat';
        form.submit();
    }   
      


    // // 提交添加表单
    // $('#add').click(function(){
    //     $('form[name="store"]').submit();
    // });    

    // //设置修改表单参数
    // function doupdate(v,v1,v2)
    // {   
    //      var form = document.update1;

    //      form.action = '/admin/advice/'+v;

    //      form.topic.value = v1;

    //      form.topic_content.value = v2;

    // }


    // //提交修改表单
    // $('#update').click(function(){

    //     $('form[name="update1"]').submit();
    // }); 


     


</script>
@endsection









                









