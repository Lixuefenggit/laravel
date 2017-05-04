@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">热门管理</button>
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
            <form action='/Htgl_hosspecial/' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>         

            <form action='/Htgl_hosspecial/' method='get' class="form-inline">
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
                        <th>图片名称</th>
                        <th>图片标题</th>
                        <th>图片内容</th>
                        <th>操作时间</th>
                        <th>操作&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="color:yellow" href='/Htgl_hosspecial/create'>添加热门</a></th>
                    </tr>
                </thead>
            <tbody>
             @foreach($list as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td><img src='{{ $v->img }}' width='50' height='50'></td>
                        <td>{{ $v->imgtitle}}</td>
                        <td>{{ $v->imgcontent}}</td>
                        <td>{{ $v->time}}</td>
                        <td>
                            <a class="btn btn-sm btn-alt m-r-5" href='/Htgl_hosspecial/{{ $v->id }}/edit'>修改</a>
                            <a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>                                                       
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
                        form.action = '/Htgl_hosspecial/'+id;
                        form.submit();
                    }
                }
            </script>      
@endsection