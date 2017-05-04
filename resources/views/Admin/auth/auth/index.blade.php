@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">权限列表</h3>
        <a style="cursor:pointer" href="/Admin/auth/add"><h3 class="block-title" style="margin-left:905px">添加权限</h3></a>
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
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>权限</th>
                        <th>URL</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->auth_name }}</td>
                            <td>{{ $v->urls }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:userDelete({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/Admin/auth/edit/{{ $v->id }}'>修改</a>
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
        function userDelete(id)
        {
            if(confirm('确定要删除吗？')){
                window.location.href="/Admin/auth/delete/"+id;
            }
        }
    </script>
@endsection

