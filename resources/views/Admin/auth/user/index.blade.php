@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户权限列表</h3>
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
                        <th>用户</th>
                        <th>角色</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->username }}</td>
                            <td>{{ $v->role }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:userDelete({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/Admin/auth/user/edit/{{ $v->id }}'>修改</a>
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
                window.location.href="/Admin/auth/user/delete/"+id;
            }
        }
    </script>
@endsection

