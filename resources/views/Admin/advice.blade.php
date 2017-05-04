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

    <form action='/admin/advice' method='get'>
                <div class='medio-body'>
                    主题：<input type='text' class='form-control input-sm m-b-10' name='topic'>
                </div>
                <input type='submit' class='btn' value='搜索'>
    </form>

    <br>
    <!-- <h3 class="block-title">您的相关信息</h3> -->
    <div class="table-responsive overflow" style="overflow: hidden;" tabindex="5005">
        <table class="table table-bordered table-hover tile" style='font-size:13px;'>
            <thead>

                @if (session('info'))
                    <script>
                        alert("{{ session('info') }}");
                    </script>
                @endif

                <thead>
                    <tr>

                        <th>编号</th>
                        <th>主题</th>
                        <th>主题内容</th>
                        <th>创建者</th>
                        <th>创建时间</th>
                        <th>修改状态</th>
                        <th colspan="3" align="right">建议管理</th>

                    </tr>
                </thead>
                <tbody>

                    <!-- 删除表单 -->
                    <form style='display:none' action='/admin/advice' method='post' name='delete'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>               


                    <!-- 修改状态表单 -->
                    <form style='display:none' action='/admin/advice' method='get' name='status'>
                        <input type="hidden" name="statu" value="1">
                        <input type="hidden" name="ID" value="">
                    </form>

                    <!-- 添加修改大DIV -->
                    <div class="block-area" id="custom" style="padding: 0px 0px 0;">
                                                    <!-- 添加链接 -->
                     <p><a data-toggle="modal" href="#form-modal" style="font-size:20px; color:#4DB4ED">添加主题模块</a></p>

                    @foreach ($list as $v)
                     <tr id="list">
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->topic }}</td>
                            <td>{{ $v->topic_content }}</td>
                            <td>{{ $v->creator }}</td>
                            <td>{{ $v->creator_time }}</td>
                            <td><a href="javascript:doStatus( '{{$v->id}}','{{$v->status}}' )" style="color:#4DB4ED">@if($v->status == 1)普通@else置顶@endif</a></td>
             

                            <td><a href="/admin/uAdvice/{{ $v->id }}" style="color:#4DB4ED">查看建议</a></td>
             
                            <td>

                                    
                                
                                <!--修改链接 -->
                                <p><a data-toggle="modal" href="#form-modal1" style="color:#4DB4ED" onclick="doupdate('{{ $v->id }}','{{ $v->topic }}','{{ $v->topic_content }}')">修改主题模块</a></p>
                                   

                            </td>
                            <td ><a href="javascript:doDel({{ $v->id }})"><span style="color:#4DB4ED">删除</span></a></td>
                     </tr>
                     @endforeach
               

                                    
                            <!-- 添加弹窗 -->
                                    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">添加主题模块</h4>
                                                </div>

                                                <div class="modal-body">
                                                    <form style='display:none' action='/admin/advice' method='post' name='store' enctype='multipart/form-data'>
                                                    {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="inputEmail4" class="col-md-2 control-label">主题背景图片</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-sm" id="inputEmail4" placeholder="......" value="{{old('pic')}}" type="file" name="pic">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputName4" class="col-md-2 control-label">建议主题</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-sm" id="inputName4" placeholder="......" value="{{old('topic')}}" type="text" name="topic">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputMessage3" class="col-md-2 control-label">建议内容</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control auto-size input-sm" name="topic_content" id="inputMessage3" placeholder="......"  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 50px;">{{old('topic_content')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-sm btn-alt" id="add">执行添加</button>
                                                    <button type="button" class="btn btn-sm btn-alt" data-dismiss="modal">结束</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                


                                <form style='display:none' action='' method='post' name='update1' enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }} 
                                <!-- 修改弹窗 -->
                                    <div class="modal fade" id="form-modal1" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">修改主题模块</h4>
                                                </div>

                                                <div class="modal-body">
                                                 
                                                        <div class="form-group">
                                                            <label for="inputEmail4" class="col-md-2 control-label">主题背景图片</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-sm" id="inputEmail4" placeholder="......"  type="file" name='pic'>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputName4" class="col-md-2 control-label">主题</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-sm" id="inputName4" placeholder="......" type="text" name='topic'>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputMessage3" class="col-md-2 control-label">主题内容</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control auto-size input-sm" id="inputMessage3" placeholder="......" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 50px;" name="topic_content"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-alt" id="update">执行修改</button>
                                                    <button type="button" class="btn btn-sm btn-alt" data-dismiss="modal">结束</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>

            </tbody>
        </table>
    </div>
        {{ $list->appends($where)->links() }}
</div>
<br><br><br>
@endsection
@section('js')
<script type="text/javascript">
    function doDel(id)
    {
        if(confirm("你确定要删除吗？")){
            var form = document.delete;
            form.action = '/admin/advice/'+id;
            form.submit();
        }
    }    

    // 提交添加表单
    $('#add').click(function(){
        $('form[name="store"]').submit();
    });    

    //设置修改表单参数
    function doupdate(v,v1,v2)
    {   
         var form = document.update1;

         form.action = '/admin/advice/'+v;

         form.topic.value = v1;

         form.topic_content.value = v2;

    }


    //提交修改表单
    $('#update').click(function(){

        $('form[name="update1"]').submit();
    }); 


    // 状态提交
    function doStatus(id,v)
    {
            
            var statu;
            if( v== '1'){
                statu = '2';
            }else{
                statu = '1';
            }   
            var form = document.status;
            form.action = '/admin/advice';
            form.statu.value = statu;
            form.ID.value = id;
            form.submit();
        
    }   
           


</script>
@endsection









                









