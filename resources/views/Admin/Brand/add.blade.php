@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加品牌</h3>
        
        <p>填空添加品牌</p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action='/Admin/brand' method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入品牌名称" name='brand_name'>
                </div>

                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入地址" name='url'>
                </div>
                <div class= class="fileupload fileupload-new" data-provides="fileupload">
                    <input type="file" class="btn btn-file btn-sm btn-alt" placeholder="请上传图片" name='pic'>
                </div>

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection