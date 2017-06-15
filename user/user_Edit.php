<?php
	require_once "../public/init.php";

	$userinfo = new UserInfo();
	$zt = $userinfo->isok();
	
	$userinfo=$db->select("select * from user where username='".UID."'");
	$mobile=$userinfo[0]["mobile"];
	$xingming=$userinfo[0]["xingming"];
	$sex=$userinfo[0]["sex"];
	$email=$userinfo[0]["email"];
	
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">	
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>修改资料<?php echo $webname;?></title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>	
		<link rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<style type="text/css">
		    *{margin: 0;padding: 0;}
			#userPassword header{height: 50px; width: 100%;background: #F1EEEE;position: relative;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 100%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
		    #userPassword .row{margin: 0;box-sizing: border-box;padding:0px 15px;}
		    .btn{background:#AAAAAA ;color: #666666;}
		   .bc .btn:hover{background: #D00878;color: #fff;}
		   
		    #userPassword .userPasswordInfo{/*margin-top: 15px;*/}
		    .successWarp{display: none; text-align:center; width: 80%;height: 150px;background: #D00878;position: absolute;left: 0;right: 0;top: 100px;margin: auto;z-index: 1000;}
		    .successWarp h3{color: #fff;}
		</style>
	</head>
	<body id="userPassword" style="background: #DDDDDD;">
		<header>
			<span class="iconfont icon-back"></span>
			<p >修改资料</p>
		</header>
		<div class="userPasswordInfo">
			<div class="successWarp">
				<span class="iconfont " style="color: pink;font-size: 6rem;"></span>
				<h3></h3>				
			</div>
			
			<form name="form_edit_profile" action="user_EditSava.php" method="post" id="editInfo">
				
				
				<div class="row" style="height: 20px;">
					<span id="xingming_error" style="font-size: 1rem;color: red;"> </span>
					<span id="" style="font-size: 1rem;color: red;"> </span>
					<span id="mobile_error" style="font-size: 1rem;color: red;"> </span>
				</div>
				<div class="row">
					<div class="input-group m-b"  style="height: 45px;">
						<span class="input-group-addon">真实姓名:</span>
						    
						<input style="height: 45px;" name="xingming" type="text"  id="xingming" value="<?php echo $xingming;?>" class="txtinput form-control" placeholder=" 请填写真实姓名" >
				    </div>
				    <div class="input-group m-b"  style="height: 45px;">
						<span class="input-group-addon">邮箱地址:</span>
						     
						<input style="height: 45px;" name="email" type="text"  id="email" value="<?php echo $email;?>" class="txtinput form-control" placeholder=" 请填写真实姓名" >
				    </div>
				</div>
				<div class="row" style="line-height: 30px;font-size: 1.2rem;color: #999999;">请重新设置当前资料</div>
				<div class="row">
					
				    <div class="input-group m-b" style="height: 50px;">
				    	<span class="input-group-addon">您的性别:</span>
                            <div class="col-xs-12 " style="padding-left: 0;width:100%;">
	                            <select class="form-control m-b" name="sex" style="height: 50px;">
	                                <option value="保密" selected="selected">保密</option>
									<option value="先生" <?php if($sex=='先生') echo "selected";?>>先生</option>
									<option value="女士" <?php if($sex=='女士') echo "selected";?>>女士</option>
	                            </select>
					       </div>
					</div>
				</div>
				 
				<div class="row">
					<div class="input-group m-b" style="height: 50px;">
						<span class="input-group-addon">手机号码:</span>
						
						<input style="height: 50px;" name="mobile" type="text"  id="mobile" value="<?php echo $mobile; ?>"   class="txtinput form-control"  placeholder=" 请填写手机号码">
				    </div>
				</div>
				<div class="row bc" style="margin-top: 18px;" >
					<button  type="submit" class="btn btn-primary" style="width: 100%;height: 40px; ">保存</button>
				</div>
			</form>
			
		</div>
		
	</body>
	<script src="../js/jquery-3.0.0.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$('.userPasswordInfo').on('focus','input',function () {
			$('.userPasswordInfo .input-group-addon').removeClass('colorAcyive');
			$(this).siblings('span').addClass('colorAcyive');
		})
		
		$(function(){
		    $('#editInfo').submit(function(){		         
		        if(!$('#xingming').val()){				
				    $('#xingming_error').html('*请填写真实姓名');
				    $('#mobile_error').html('');
			            return false;
				} else{
		            $('#xingming_error').html('');
		       }			
		        if(!$('#mobile').val()){
		            $('#mobile_error').html('*请输入您的手机号码');
		            $('#xingming_error').html('');
		            return false;
		        }else{
		            $('#mobile_error').html('');
		            
		        }
		        
              $.ajax({
				url:"user_EditSava.php",
				data:$('#editInfo').serialize(),
				type:"POST",
				success:function(data){				  					 
					  switch(eval(data)){
					  	case 1:

                           $('.successWarp').children('span').removeClass('icon-fail').addClass('icon-duihuanchenggong');
					  	    $('.successWarp').children('h3').html('修改成功');
					  	   $('.successWarp').slideDown();
                           setTimeout(function () {
                           	 $('.successWarp').hide();
                           },2000)
                          
					  	   break;
					  	   default:
					  	   $('.successWarp').children('span').addClass('icon-fail').removeClass('icon-duihuanchenggong');
					  	    $('.successWarp').children('h3').html('修改失败');
					  	   $('.successWarp').slideDown();
                           setTimeout(function () {
                           	 $('.successWarp').hide();
                           },2000)	
					  }
						 
					},
					error:function(e){
						 //错误的页面.
						  alert('表单提交错误');
						}
					 });	
		         return false;
		    });
		     
		})  ; 
		$(".icon-back").click(function(){
		history.go(-1);
				
	})            
		   
	</script>
</html>
