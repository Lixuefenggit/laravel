@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改品牌</h3>
        
        <p>填空修改品牌</p>
        
        <div class="row">
            <form action='/Admin/brand/{{ $ob->id }}' method='post'  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="hidden" value='{{ $ob->id }}' name='id'>
                    <input type="text" class="form-control m-b-10" placeholder="请输入用品牌" name='brand_name' value="{{ $ob->brand_name }}">
                </div>

                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入地址" name='url' value="{{ $ob->url }}">
                </div>
                <div class= class="fileupload fileupload-new" data-provides="fileupload">
                    <input type="file" class="btn btn-file btn-sm btn-alt" placeholder="请输入图片" name='pic' alt="图片失败">
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection