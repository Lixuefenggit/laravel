@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改关键词</h3>
        
        <p>填空修改关键词</p>
        
        <div class="row">
            <form action='/Admin/keywords/edit/{{ $ob->id }}' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入关键词" name='name' value="{{ $ob->name }}">
                </div>
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='present'>
                        <option value='1' @if($ob->present ==1)selected @endif>显示</option>
                        <option value='2' @if($ob->present ==2)selected @endif>不显示</option>
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