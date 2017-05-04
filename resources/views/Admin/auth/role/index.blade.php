@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">管理员角色列表</h3>
        <a style="cursor:pointer" href="/Admin/auth/role/add"><h3 class="block-title" style="margin-left:905px">添加角色</h3></a>
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
                        <th>角色</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->auth }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:userDelete({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/Admin/auth/role/edit/{{ $v->id }}'>修改</a>
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
                window.location.href="/Admin/auth/role/delete/"+id;
            }
        }
    </script>
@endsection

