@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">商品列表</h3>
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
                        <th>商品名称</th>
                        <th>价格</th>
                        <th>销量</th>
                        <th>是否上架</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->price }}</td>
                            <td>{{ $v->sale_count }}</td>
                            <td>{{ ($v->on_sale == 1)?'上架':'下架' }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href='javascript:deleteLinks({{ $v->id }})'>删除</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/Admin/goods/edit/{{ $v->id }}'>修改</a>
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
        function deleteLinks(id)
        {
            if(confirm('确定要删除吗？')){
               window.location.href="/Admin/goods/delete/"+id;             
            }
        }
    </script>
@endsection

