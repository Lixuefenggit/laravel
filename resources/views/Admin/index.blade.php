@extends('Admin.base.parent')

@section('content') 

<div class="block-area" id="defaultStyle">
    <h3 class="block-title" style='font-size:15px;'>您的相关信息</h3>
    <table class="table tile" style='font-size:13px;'>
        <tbody>
            <tr>
                <td>角色:[{{ $user['role'] }}]</td>
                <td>这是您第[{{ $user['degree'] }}]次,登录！</td>
                <td>登录时间:{{ $user['login_time'] }}</td>
            </tr>
            <tr>

                <td>您上次的登陆时间： 
                    @if (empty($user['last_time']))
                        这是您第一次登录
                    @else
                        {{$user['last_time']}}
                    @endif
                
                </td>

                <td>上次登录IP：
                    @if (empty($user['last_ip']))
                        这是您第一次登录
                    @else
                        {{ $user['last_ip'] }}
                    @endif
                </td>
                <td>如非您本人操作，请及时更改密码</td>
            </tr>
            <tr>
                <td>当前登录帐号:{{ $user['username'] }}</td>
                <td>注册时间:{{ $user['register_time'] }}</td>
                <td>当前登录IP:{!! $_SERVER [ 'REMOTE_ADDR' ] !!}</td>
            </tr>      
        </tbody>
    </table>
</div>

<div class="block-area" id="tableStriped">
    <h3 class="block-title" style='font-size:15px;'>系统登录记录</h3>
    <!-- <h3 class="block-title">您的相关信息</h3> -->
    <div class="table-responsive overflow" style="overflow: hidden;" tabindex="5005">
        <table class="table table-bordered table-hover tile" style='font-size:15px;'>
            <thead  style='align:center;' >
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>登录时间</th>
                    <th>邮箱地址</th>
                    <th>登录IP</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($list as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->username }}</td>
                        <td>{{ $v->login_time }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->last_ip }}</td>
                    </tr>
                @endforeach

              
            </tbody>
        </table>
    </div>
</div>


@endsection