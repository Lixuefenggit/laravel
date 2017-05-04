@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改栏目</h3>
        
        <p>填空修改栏目</p>
        
        <div class="row">
            <form action='{{ url("/Admin/column")."/".$ob->id }}' method='post'  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-4">
                    <input type="hidden" value='{{ $ob->id }}' name='id'>
                    <input type="text" class="form-control m-b-10" placeholder="请输入用栏目" name='name' value="{{ $ob->name }}">
                </div>



                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection