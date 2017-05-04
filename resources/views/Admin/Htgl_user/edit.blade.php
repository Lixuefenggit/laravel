@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    &nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">修改权限</button>
    <div class="block-area" id="text-input">
     
        <div class="row">
            <form action='/Htgl_user/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='auth'>
                        <option value='1' @if($ob->auth==1)selected @endif>允许使用</option>
                        <option value='2' @if($ob->auth ==2)selected @endif>禁止使用</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection