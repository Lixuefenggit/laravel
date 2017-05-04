@extends('Admin.base.parent')

@section('content') 
    <div id="skin-blur-violate">
        <section id="login">
 
            <div class="clearfix"></div>
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login -->
            <form class="box tile animated active" id="box-register" action='/admin/doregister' method='post'>
                {{ csrf_field() }}


                @if (session('msg'))
                    <script>
                        alert("{{ session('msg') }}");
                    </script>
                @endif

                <h2 class="m-t-0 m-b-15">注册添加管理员</h2>
              
                <!-- Register -->
                
                <input type="text" class="login-control m-b-10" placeholder="请输入用户名" name='username' value="{{old('username')}}">
                <input type="email" class="login-control m-b-10" placeholder="请输入邮箱" name='email' value="{{old('email')}}">    
                <input type="password" class="login-control m-b-10" placeholder="请输入密码" name='password' value="{{old('password')}}">
                <input type="password" class="login-control m-b-20" placeholder="请确认密码" name='repassword' value="{{old('repassword')}}">
<!-- 
                <div class="btn-group bootstrap-select select dropup">
   
                    <div class="col-md-4 form-group">
                        <h5>分配管理员等级</h5>
                        <select name="level" class="form-control input-sm validate[required]" id="form-validation-field-0">
                            <option value="1">1级权限</option>
                            <option value="2">2级权限</option>
                            <option value="3">3级权限</option>
                            <option value="4">4级权限</option>
                            <option value="5">5级权限</option>
                        </select>
                    </div>
                </div> -->

            

                <button class="btn btn-sm m-r-5">注册</button>

                <!-- <small><a class="box-switcher" data-switch="box-login" href="">已经有帐户?</a></small> -->
            </form>

        </section>                      
        

    </div>
@endsection