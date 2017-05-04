@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户管理信息列表</h3>
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
        <div class="table-responsive overflow">
        	<form action='{{ url("/Admin/colunm") }}' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}

        	</form>

        	<form action='/Admin/column' method='get'>
        		<div>
					品牌名称：<input type='text' class='form-control input-sm m-b-10' name='name'>
        		</div>

                <input type='submit' class='btn' value='搜索'>
        		
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>栏目名称</th>
                        <th>路径</th>
                        <th>父ID</th>

                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
	                        <td>{{ $v->path }}</td>
	                        <td>{{ $v->pid }}</td>

	                       
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href="{{ url('/Admin/column').'/'.$v->id }}/edit">修改</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="{{ url('/Admin/column/subclass').'/'.$v->id }}">添加子类</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
           {{ $list ->links() }}
    </div>
    <script type="text/javascript">
        function doDel(id){
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/Admin/column/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection