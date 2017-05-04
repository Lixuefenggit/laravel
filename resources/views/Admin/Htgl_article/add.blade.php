@extends('Admin.base.parent')
@section('content')
&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-success">文章添加</button>

<div class="block-area" id="text-input">
    <div class="row">
         <form action='/Htgl_article' method='post' enctype='multipart/form-data'>
           		 {{ csrf_field() }}
                <div class="col-lg-6">
                    <h5>文章标题：</h5><input type="text" class="form-control m-b-10" placeholder="请输入文章标题" name='title'>
                </div>

                <div class="col-lg-6">
                    <h5>图片标题:</h5><input type="text" class="form-control m-b-10" placeholder="请输入图片标题" name='img_title'>
                </div>

                <div class="col-lg-6">
                    <h5>图片内容:</h5><input type="text" class="form-control m-b-10" placeholder="请输入图片内容" name='img_content'>
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

                <div class="col-lg-12">
                    <h5>文章分类:</h5><select name='uid' class='form-control m-b-10'>
                        <option value='1'>最新动态</option>
                        <option value='2'>严选幕后</option>
                        <option value='3'>丁磊私物推荐</option>
                        <option value='4'>严选推荐</option>
                    </select>
                </div>                   

                <div class="block-area" id="markdown-editor">
                    <div class="md-editor tile" id="1492607045553">
                    <hr><br>
                    <h5 style="text-align:center;color:yellow; "><——文章内容——></h5>
                    <br>
                    <textarea class="markdown-editor md-input" name="content" rows="30" style="resize: none;"></textarea>
                    </div>    
                </div>    

                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>       
            </form>          
        </div>
    </div>
@endsection