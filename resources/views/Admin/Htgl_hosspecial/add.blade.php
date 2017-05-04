@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">热门添加</button>

<div class="block-area" id="text-input">
    <div class="row">
         <form action='/Htgl_hosspecial' method='post' enctype='multipart/form-data'>
           		 {{ csrf_field() }}

                <div class="col-lg-6">
                    <h5>图片标题:</h5><input type="text" class="form-control m-b-10" placeholder="请输入图片标题" name='imgtitle'>
                </div>

                <div class="col-lg-6">
                    <h5>添加时间:</h5><input type="text" class="form-control m-b-10" placeholder="请输入修改时间" name='time'><br> 
                </div>

                <div class="col-lg-6">             
                        <div class="fileupload fileupload-new" data-provides="fileupload" name=''>
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

                <div class="block-area" id="markdown-editor">
                    <div class="md-editor tile" id="1492607045553">
                    <textarea class="markdown-editor md-input" name="imgcontent" rows="30" style="resize: none;"></textarea>
                    </div>    
                </div>    

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>       
            </form>          
        </div>
    </div>
@endsection