@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">关键词列表</h3>
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
        	<form action='/Admin/keywords/index' method='post'>
                {{ csrf_field() }}
        		<div class='medio-body'>
    				关键词：<input type='text' class='form-control input-sm m-b-10' name='name'>
    			</div>
        		<div>
        			是否显示：<select name='present' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='1'>--显示--</option>
        				<option value='2'>--不显示--</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>关键词</th>
                        <th>是否显示</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ ($v->present == 1)?'显示':'不显示' }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:deleteKeywords({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/Admin/keywords/edit/{{ $v->id }}'>修改</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>

    <script>
        ;
        function deleteKeywords(id)
        {
            if(confirm('确定要删除吗？')){
                window.location.href="/Admin/keywords/delete/"+id;
            }
        }
    </script>
@endsection

