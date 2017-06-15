<?php
	require '../public/init.php';
	$userinfo  = new UserInfo();
	$zt=$userinfo->isok();
	$_SESSION["editOK"]="ok";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>	
		<link rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>新增地址</title>
		<style>
			*{margin: 0;padding: 0;}
			#userPassword header{height: 50px; width: 100%;background: #F1EEEE;position: relative;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 86%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
		    /*#userPassword .row{margin: 0;box-sizing: border-box;padding:0px 15px;}*/
		   .rem {width: 100%;height: 39px;background: #fff;line-height: 38px;border-bottom: 1px solid #EFEFEF;}
		</style>
	</head>
	<body id="userPassword" style="background: #DDDDDD;">
	<form action="user_receiveSava.php" method="post" name="form_add_consignee" id="fromadd">
		<header>
			<span class="iconfont icon-back"></span>
			<p style="display: inline-block;">新增地址</p>
			<input value="保存" type="submit" style="display: inline-block;background: #F1EEEE">
		</header>
		<div class="container">
			<div class="row" style="height: 20px;">
					<span id="post_error" style="font-size: 1rem;color: red;"> </span>
					<!--<span id="post_notice" style="font-size: 1rem;color: red;">请不要填写省市区 </span>
					<span id="post_error" style="font-size: 1rem;color: red;"> </span>-->
			</div>
			<ul class="row" style="margin-top: 18px;">
		
				<li class="col-xs-12 rem">
					<span ><input type="hidden" name="action" value="add" />收货人&nbsp;&nbsp;</span>
					<input name="shren"  type="text" id="shren" placeholder=" 请输入收货人真实姓名">
				</li>
				<li class="col-xs-12 rem">
					<span >手机号</span>
					<input name="mobile" size="20" type="text" id="mobile" placeholder=" 请输入收货人手机号">
				</li>
				<li class="col-xs-12 rem">
					<span>收货地址;&nbsp;</span>
					<span class="render_province"></span> <span class="render_city"></span> <span class="render_district"></span>
					<input name="shdizhi" type="text" id="shdizhi" placeholder=" 请输入收货人地址">
				</li>
				<li class="col-xs-12 rem" style="margin-top: 16px;">
					<span >邮编</span>
					<input  name="youbian" size="10" type="text" id="youbian" >
				</li>
				<li class="col-xs-12 rem">
					<span>固定电话&nbsp;</span>
					<input  name="tel" size="20" type="text" id="tel" >
				</li>
			</ul>
		</div>
		</form>
	</body>
	<script src="../js/jquery-3.0.0.js" ></script>
	<script type="text/javascript">
		$(function(){
		  	$('#fromadd').submit(function(){
				  if(!$('#shren').val()){	
				  	    $("#post_error").html(" *请输入收货人");			  
					    return false;
				   }
				   if(!$('#tel').val() && !$('#mobile').val()){
				  	   $("#post_error").html(" *固定电话和手机中必填一项");					  
					   return false;
				   }
				  if(!$('#shdizhi').val()){	
				    	$("#post_error").html(" *请输入收货地址");			  
					    return false;
				   }
				  if(!$('#youbian').val()){		
				  		$("#post_error").html(" *请输入收货地址邮编");			  
					    return false;
				   }
				  
	   		   
			})
	  	})
	</script>
</html>
