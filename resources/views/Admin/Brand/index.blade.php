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
        	<form action='/Admin/brand' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}

        	</form>

        	<form action='/Admin/brand' method='get' name="1">
        		<div>
					品牌名称：<input type='text' class='form-control input-sm m-b-10' name='brand_name'>
        		</div>
                <input type='submit' class='btn' value='搜索'>
        		
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>品牌名称</th>
                        <th>图片</th>
                        <th>地址</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->id }}</td>
	                        <td>{{ $v->brand_name }}</td>
	                        <td> <img src="/Admin/upload/{{ $v->pic }}" alt="图片失败" style="width:35px;height:30px"></td>
	                        <td>{{ $v->url }}</td>
	                       
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/Admin/brand/{{ $v->id }}/edit'>修改</a>
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
        		form.action = '/Admin/brand/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection