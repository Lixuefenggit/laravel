@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">文章管理</button>
<div class="block-area" id="tableHover">
        @if(session('msg'))
            <div class="alert alert-success alert-icon">
                   {{ session('msg') }}
                <i class="icon"></i>
            </div>  
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
                   {{ session('error') }}
                <i class="icon"></i>
            </div>
        @endif

            <form action='/Htgl_user/' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>         

<form action='/Htgl_article/' method='get' class="form-inline">
  <div class="form-group">
    <div class="input-group">
      <input type="text" name='title' class="form-control" id="exampleInputAmount" placeholder="请输入查询文章名">
    </div>
  </div>
                <button type="submit" class="btn btn-primary">搜索</button>
</form><br>
 

        <div class="table-responsive overflow">
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>推荐标题</th>
                        <th>文章图片</th>
                        <th>文章标题</th>
                        <th>文章内容</th>
                        <th>文章类别</th>
                        <th>操作时间</th>
                        <th>操作&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="color:yellow" href='/Htgl_article/create'>添加文章</a></th>
                    </tr>
                </thead>
            <tbody>
             @foreach($list as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td><img src='{{ $v->img }}' width='50' height='50'></td>
                        <td>{{ $v->img_title }}</td>
                        <td>{{ $v->img_content }}</td>
                        <td>{{ ($v->uid==1)?'最新动态':(($v->uid==2)?'严选幕后':(($v->uid==3)?'丁磊私物推荐':(($v->uid==4)?'严选推荐':'严选推荐'))) }}</td>
                        <td>{{ $v->time }}</td>
                        <td>


                            <a class="btn btn-sm btn-alt m-r-1" href='/Htgl_article/{{ $v->id }}/edit'>修改文章</a>
                            <a class="btn btn-sm btn-alt m-r-1" href='javascript:doDel({{ $v->id }})'>删除文章</a>                                                      
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            {{ $list->appends($jieshou)->links() }}
        </div>
</div>
            <script type="text/javascript">
                function doDel(id){
                    if(confirm('确定删除吗?')){
                        var form = document.myform;
                        form.action = '/Htgl_article/'+id;
                        form.submit();
                    }
                }
            </script>    
@endsection