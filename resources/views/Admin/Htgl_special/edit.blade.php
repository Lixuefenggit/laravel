@extends('Admin.base.parent')
@section('content')
    <!-- Text Input -->
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">修改导航</button>
<div class="block-area" id="text-input">
    <div class="row">
         <form action='/Htgl_special/{{ $ob->id }}' method='post' enctype='multipart/form-data'>
             {{ csrf_field() }}
            {{ method_field('PUT')}}
                <div class="col-lg-6">

                    <input type="text" class="form-control m-b-10" placeholder="请输入导航名称" name='navname' value="{{ $ob->navname }}">
                </div>

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="请输入修改时间" name='time' value="{{ $ob->time }}">
                </div> 

                 <div class="col-lg-12">
                    <div class="col-lg-6">             
                            <div class="fileupload fileupload-new" data-provides="fileupload" name='' value="{{ $ob->img }}">
                                            <div class="fileupload-preview thumbnail form-control"></div>
                                            <div>
                                                <span class="btn btn-file btn-alt btn-sm">
                                                    <span class="fileupload-new">选择图片</span>
                                                    <span class="fileupload-exists">重选</span>
                                                    <input type="file" name="img">
                                                </span>
                                                <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">删除</a>
                                            </div>
                                        </div>
                                   </div>
                                   <br><br><br><br><br><br><br><br><br>
                <div class="col-lg-6">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div> 
            </div>       
            </form>          
        </div>
    </div>                
      

@endsection