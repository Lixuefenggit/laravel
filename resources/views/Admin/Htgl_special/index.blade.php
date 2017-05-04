@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">专题管理</button>
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
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>导航名称</th>
                        <th>导航图片</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
            <tbody>
             @foreach($list as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->navname }}</td>
                        <td><img src='{{ $v->img }}' width='50' height='50'></td>
                        <td>{{ $v->time}}</td>
                        <td>
                            <a class="btn btn-sm btn-alt m-r-5" href='/Htgl_special/{{ $v->id }}/edit'>修改</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

        </div>
    </div>
@endsection