<?php
	require_once "../config/config.php";
	
	
	?>
<!--<link rel="stylesheet" href="../css/index.css" />-->
<meta charset="UTF-8">		
<title><?php echo $webname; ?>轩贝管理员登陆</title>
<style>
	.login_bg{width:100%;height: 600px;min-width:600px;margin: 0 auto;box-sizing:border-box;padding-top: 120px;background: url(../images/timg3.jpg);background-size: 100% 100%;}
		    .login_center{width: 400px;height: 380px;margin: 0 auto; text-align: center;}
		    .login_Center_user{width: 400px;height: 300px;background: url(../images/timg5.jpg);background-size: 100% 100%;margin: 0 auto;border-radius: 6px;color: #F0E7D0;overflow: hidden;}
</style>

	<body>
		<div class="login_bg">
			<div class="login_center">
				<h2 style="color: #fff;"><strong style="font-size: 2rem;font-family:castellar;">轩贝商城</strong><span>后台管理系统</span></h2>
				<div class="login_Center_user" style="float: left;">
					<form name="myform" onSubmit="return test();" action="loginSave.php" method="post">
					
					 <div style="margin-top: 50px;">
					 	<p>管理员： <input  name="username" type="text" placeholder="请输入用户名" value=""></p>
					    <p>密&nbsp;码： <input name="password" type="password" placeholder="请输入密码" value=""></p>
					    <p>验证码： <input placeholder="请输入验证码" class=wenbenkuang name="code" type=text value="" maxLength=4 size=10> 
						    	 <img  src='../public/code.php' onclick="this.src='../public/code.php?id='+Math.random()"></p>
					 </div>
					<div style="margin-left:10%; margin-top: 30px;margin-bottom: 30px;">
						<input style="margin-right:8%;" name="Submit" type="submit" class="button" id="Submit" value="登 陆" ></input>
						<input name="cs" type="button" class="button" id="cs" value="取 消" onClick="showConfirmMsg1()"></input>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!--<header id="login_h"></header>
		<div class="content">
			<div class="content_cont">
				
				<div class="content_left">
					<img src="../images/logo.png" />
					<ol>
						<li>- 不一样的童装，不一样的童年</li>
						<li>- 酷酷的靓靓的衣橱</li>
						<li>- 轩贝童装,承载父母的爱</li>
					</ol>
				</div>
				<div class="content_center">
					
				</div>
				<div class="content_right">
					<h4>轩贝商城后台管理</h4>
					<form name="myform" onSubmit="return test();" action="loginSave.php" method="post">
					<table>
						<tr>
							<td height="30">管理员：<input  name="username" type="text" placeholder="请输入用户名" value=""></td>
						</tr>
						<tr>
							<td height="30">密 码 ：<input name="password" type="password" placeholder="请输入密码" value="">
								<img style="margin-left: 7px;" src="../images/luck.gif">									
							</td>
						</tr>
						<tr>							
						    <td height="35" colspan="2" class="top_hui_text">验证码：
						    	<input placeholder="请输入验证码" class=wenbenkuang name="code" type=text value="" maxLength=4 size=10> 
						    	<img  src='../public/code.php' onclick="this.src='../public/code.php?id='+Math.random()">
                              </td>
						</tr>
						<tr>
							
						</tr>						
					</table>					
					<div style="margin-left:20%; margin-top: 10px;margin-bottom: 30px;">
						<input style="margin-right:8%;" name="Submit" type="submit" class="button" id="Submit" value="登 陆" ></input>
						<input name="cs" type="button" class="button" id="cs" value="取 消" onClick="showConfirmMsg1()"></input>
					</div>
					</form>
					<div style="float: right;"> <img src="../images/login-wel.gif" ></div>
						  
				</div>
			</div>
		</div>
		
		<footer id="login_f">
			<h5 style="color: #9dcab8;width: 100%;margin: auto;">Copyright © 2016 www.xuanbei.com</h5>			
		</footer>
		-->
	</body>
	<script language="JavaScript">
		function correctPNG()
		{
		    var arVersion = navigator.appVersion.split("MSIE")
		    var version = parseFloat(arVersion[1])
		    if ((version >= 5.5) && (document.body.filters)) 
		    {
		       for(var j=0; j<document.images.length; j++)
		       {
		          var img = document.images[j]
		          var imgName = img.src.toUpperCase()
		          if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
		          {
		             var imgID = (img.id) ? "id='" + img.id + "' " : ""
		             var imgClass = (img.className) ? "class='" + img.className + "' " : ""
		             var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
		             var imgStyle = "display:inline-block;" + img.style.cssText 
		             if (img.align == "left") imgStyle = "float:left;" + imgStyle
		             if (img.align == "right") imgStyle = "float:right;" + imgStyle
		             if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
		             var strNewHTML = "<span " + imgID + imgClass + imgTitle
		             + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
		             + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
		             + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
		             img.outerHTML = strNewHTML
		             j = j-1
		          }
		       }
		    }    
		}
	window.attachEvent("onload", correctPNG);
	function test()
	{
		if(document.myform.username.value=='')
		{
		  alert('请输入用户名');
		  return false;
		}
	    if(document.myform.password.value=='')
		{
	      alert('请输入密码');
		  return false;
		}
		if(document.myform.code.value=='')
		{
		  alert('请输入验证码');
		  return false; 
		}
	return true;	
	}
</script>
</html>
	
	
	
	
	