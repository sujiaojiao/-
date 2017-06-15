<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">	
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>登陆</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>	
		<link rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<style type="text/css">
		    *{margin: 0;padding: 0;}
			#userPassword header{height: 50px; width: 100%;background: #F1EEEE;position: relative;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 100%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
		    #userPassword .row{margin: 0;box-sizing: border-box;padding:0px 15px;}
		   
		    #userPassword .userPasswordInfo{/*margin-top: 15px;*/}
		   
		</style>
	</head>
	<body id="userPassword" style="background: #DDDDDD;">
		<header>
			<span class="iconfont icon-back"></span>
			<p >修改登录密码</p>
		</header>
		<div class="userPasswordInfo">
			<form name="form_edit_profile" action="user_passwordSava.php" method="post" id="edit">
				
				
				<div class="row" style="height: 20px;">
					<span id="ypwd_error" style="font-size: 1rem;color: red;"> </span>
					<span id="xpwd_error" style="font-size: 1rem;color: red;"> </span>
					<span id="qpwd_error" style="font-size: 1rem;color: red;"> </span>
				</div>
				<div class="row">
					<div class="input-group m-b"  style="height: 45px;">
						<span class="input-group-addon">登录密码:</span>
						<input style="height: 45px;" name="yPassword" type="text" id="yPassword" class="txtinput form-control" id="login_password" name="login_password" value="" placeholder="填写当前登录密码" >
				    </div>
				</div>
				<div class="row" style="line-height: 30px;font-size: 1.2rem;color: #999999;">请重新设置当前密码</div>
				<div class="row">
					<div class="input-group m-b" style="height: 50px;">
						<span class="input-group-addon">设置密码:</span>
						<input style="height: 50px;" name="xPassword" type="text" id="xPassword" class="txtinput form-control" id="login_password" name="login_password" value="" placeholder="字母数字组合">
				    </div>
				</div>
				<div class="row">
					<div class="input-group m-b" style="height: 50px;">
						<span class="input-group-addon">确认密码:</span>
						<input style="height: 50px;"  name="qPassword" value="" type="text" id="qPassword" class="txtinput form-control"  value="" placeholder="再次填写密码">
				    </div>
				</div>
				<div class="row" style="margin-top: 15px;" >
					<input value="保存" type="submit" class="btn btn-primary" style="width: 100%;height: 40px; background:#D00878 ;color: #fff;">
				</div>
			</form>
			
		</div>
		
	</body>
	<script src="../js/jquery-3.0.0.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$('.userPasswordInfo').on('focus','input',function () {
			$('.userPasswordInfo .input-group-addon').removeClass('colorAcyive');
			$(this).siblings('span').addClass('colorAcyive');
		})
		
		$(function(){
			$('#edit').submit(function(){		 
				if(!$('#yPassword').val()){
					$('#ypwd_error').html('*请填写密码');
					return false;
				}else{
                     $('#ypwd_error').html('');
                }
		 		if(!$('#xPassword').val()){
			 		$('#xpwd_error').html('*请填写新密码');
			 		$('#ypwd_error').html('');
			 		$('#qpwd_error').html('');
					 return false;
			 	}else{
                    $('#xpwd_error').html('');
                }                        
	 		 	if(!$('#qPassword').val()){
					$('#qpwd_error').html('*请填写确认密码');
					$('#ypwd_error').html('');	
					$('#xpwd_error').html('');	 
					return false;
				}else {
					$('#qpwd_error').html('');
                } 
                         
                if($('#qPassword').val()!=$('#xPassword').val()){
                    $('#qpwd_error').html('*请确保两次输入的密码一致');
                    $('#ypwd_error').html('');	
					$('#xpwd_error').html('');
                    return false;
                }
  
		    }) 
		    
		})
		$(".icon-back").click(function(){
		history.go(-1);
				
	})
	   
	</script>
</html>
