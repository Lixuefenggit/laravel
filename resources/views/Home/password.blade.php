<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color:#F5F3EF;">
  <section class="container">
    <div class="login">
      <h1>修改密码</h1>
        <p><input type="password" name="password" value="" placeholder="请输入新密码"></p>
        <p><input type="password" name="npassword" value="" placeholder="再次输入新密码"></p>
        <p class="submit"><input style="color:#555555;" type="submit" name="commit" id="btn" value="提交"></p>
    </div>
  </section>
<div style="text-align:center;">
</div>
</body>
</html>

<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script> 
<script type="text/javascript">
	// alert(111);

	
				$('#btn').click(function(){
						var $password=$('input[name="password"]').val();
						var $npassword=$('input[name="npassword"]').val();
						if($password=='' || $npassword==''){
							alert('密码不能为空');
							return;
						}
						if($password==$npassword){
							
		
							$.ajax({
						        url:'/Home/safety/password/edit',
						        type:'get',
						        async:true,
						        data:{'uid':1,'password':$password},
						        success:function(data){
						        	if(data){
						        		alert('修改成功');
						        	}else{
						        		alert('修改失败');
						        	}
						           
						       
						        },
						        error:function()
						          {
						            alert('修改失败');
						          }
						      });
						}else{
							alert('输入不一致');
						}

					
				});

	
		
     </script>
