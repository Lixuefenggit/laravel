@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">用户管理</button>
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
        <div class="table-responsive overflow">
        
        	<form action='/Htgl_user/' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

<form action='/Htgl_user/' method='get' class="form-inline">
  <div class="form-group">
    <div class="input-group">
      <input type="text" name='name' class="form-control" id="exampleInputAmount" placeholder="请输入查询用户名">
    </div>
  </div>
                <button type="submit" class="btn btn-primary">搜索</button>
</form><br>

            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>会员等级</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($list as $v)
                	<tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->level}}</td>
                        <td>{{ ($v->auth==1)?'允许使用':'禁止使用' }}</td>
                        <td>
                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                        	<a class="btn btn-sm btn-alt m-r-5" href='/Htgl_user/{{ $v->id }}/edit'>修改</a>
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
                        form.action = '/Htgl_user/'+id;
                        form.submit();
                    }
                }
            </script>
@endsection