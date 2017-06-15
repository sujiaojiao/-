<?php
//	$sql="select * from feedback";
//	$parm=" where 1 ";
//	$parm.=" and issh=1";
//	$sql.=$parm." order by id desc ";
//	
//	$db->sql($sql);
//	$infocount=$db->affected();
//	$pagesize=10;
//	
//	$page= new page($infocount, $pagesize);
//	
//	$sql.=$page->limit();
//	 
//	 
//	$list=$db->select($sql);
	
	?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>留言添加</title>
		<style>
			*{margin: 0;padding: 0;}						
			#userPassword header{height: 50px; width: 100%;background: #DDDDDD;position: fixed;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 100%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
	
		</style>
	</head>
	<body id="userPassword" style="background: #f3f4f5;">
		<header>
			<span class="iconfont icon-back"></span>
			<p >添加新留言</p>
		</header>
		<style>
			.content .problem{display:inline-block;width: 100%;height: 30px;padding: 6px;}
		    .content{box-sizing: border-box;padding: 0 10px 0px 10px;padding-top: 48PX;}
		   .content .row{margin: 0;}
		    .content ul li .perlist{width:100%;height: 30px;line-height: 30px;border-radius: 10px;}
		    .neirong{padding: 5px; border: 2px solid rgb(204, 204, 204); width: 100%;height: 80px; font-size: 14px; }
		    .MesP{border: 2px solid rgb(204, 204, 204); height: 22px; background: none repeat scroll 0% 0% rgb(255, 255, 255);}
		    .Mp{width: 19%;display: inline-block;font-size: 1rem;}
		  
		</style>
		<div class="content container" >
			
			<ul class="row" style="margin-top: 12px;">
			<form id="messageForm" name="messageForm" method="post" >
				<li class="panel panel-success">
					<div class="panel-heading">
					   <h3 class="panel-title">
					   	<div style="color: #D00878;">留言分类：</div>
					   	<div style="font-size: 1.4rem;">
					   		<input name="message_kind_s" value="3" type="radio" style="vertical-align: bottom;margin-left: 5%;"><span style="vertical-align: bottom;">售后问题</span>&nbsp;&nbsp; 
						   	<input name="message_kind_s" value="4" type="radio" style="vertical-align: bottom;"><span style="vertical-align: bottom;">产品咨询</span>&nbsp;&nbsp; 
						   	<input name="message_kind_s" value="5" type="radio" style="vertical-align: bottom;"><span style="vertical-align: bottom;">活动咨询</span>&nbsp;&nbsp;<br>
						   	<input name="message_kind_s" value="6" type="radio" style="vertical-align: bottom;margin-left: 5%;"><span style="vertical-align: bottom;">快递咨询</span>&nbsp;&nbsp;
						   	<input name="message_kind_s" value="7" type="radio" style="vertical-align: bottom;"><span style="vertical-align: bottom;">支付咨询</span>&nbsp;&nbsp; 
						   	<input name="message_kind_s" value="8" type="radio" style="vertical-align: bottom;"><span style="vertical-align: bottom;">订单咨询</span>&nbsp;&nbsp; 
						   
					   	</div>
					   					   
					   </h3>
					</div>
				    <div class="panel-body">			    
					    <div>
					    	<span style="color: #D00878;">留言内容：&nbsp;&nbsp;</span> 
					    	<span style="color: #999999;">(300字以内)</span>
					    	<div style="padding:5px 0 0 0;">
								<textarea id="content" class="neirong" name="content" rows="10" ></textarea>
								<p><span id="content_error" style="color:red;font-size:12px"></span></p>
							</div>
							<div style="margin:3px 0 0 0;color:#c00;font-size: 1rem;">温馨提醒：提交留言后可在页面底部区域通过留言时填写的手机号码、emai等查询客服回复</div>
					    </div>
					    <div style="height: 18px;">
					    	<p><span id="uname_error" style="color:red;font-size:12px"></span></p>
					    	<p><span id="phone_error" style="display:none;color:red;font-size:12px"></span></p>
					    </div>
					    <div style="margin-top: 6px;">
					    	<div style="margin-bottom:12px ;">
						    	<span class="Mp">留言人：</span>
						    	<input class="MesP" id="uname" name="uname" size="15" type="text"> 
						    	<span style="font-size:12px;color:#999;"></span>
						    		<!---->
					        </div>
					        <div style="margin-bottom:12px ;">
						    	<span class="Mp" style="font-size: 1rem;">手机号：</span>
						    	<input class="MesP" id="phone" name="phone" size="15" type="text"> 
						    	
						    	<span style="color:red">*</span> <span style="font-size:12px;color:#999;">真实号码</span>
					        </div>
					        <div style="margin-bottom:12px ;">
						    	<span class="Mp">QQ：</span>
						    	<input class="MesP" id="qq" name="qq" size="15" type="text"> 
						    	<span style="font-size:12px;color:#999;"></span>
						    		
					        </div>
					        <div style="margin-bottom:12px ;">
						    	<span class="Mp">邮箱：</span>
						    	<input class="MesP" id="email" name="email" size="15" type="text"> 
						    	<span style="font-size:12px;color:#999;">请填写常用邮箱</span>
						    		
					        </div>
					        <div style="margin-bottom:12px ;">
						    	<span class="Mp">旺旺：</span>
						    	<input class="MesP" id="wangwang" name="wangwang" size="15" type="text"> 
						    	<span style="font-size:12px;color:#999;">旺旺用户名</span>
						    		
					        </div>
					        
					   </div>
					    <div style="padding:5px 0 0 5px;color:#999;font-size:12px;">以上信息属个人隐私，轩贝商城承诺绝不向第三方透露。</div>
						<div style="text-align:center;padding:20px 0 30px 0;">
							<!--<input   type="submit" value="发表留言" style="background: #D00878;padding: 5px 8px;border-radius: 4px;color: #fff;">-->
							<input onclick="return checkForm();" src="../images/feedback_btn.gif" type="image">
						</div>
							<!--<div style="padding:30px 0 30px 0;text-align:center;font-size:14px;"></div>-->
					</div>
								 
				</li>
				
			</form>
				
			</ul>
			
	
		</div>
	
	
	</body>
	<script src="../js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
		
			function checkForm(){
				var content = $('#content').val();
				var uname = $('#uname').val();
				var qq = $('#qq').val();
				var wangwang = $('#wangwang').val();
				var email = $('#email').val();
				var phone = $('#phone').val();
				
			
				if (content=='')
				{
					$('#content_error').html('* 请填写留言内容');
					$('#content_error').show();
					return false;
				}
				else
				{
					$('#content_error').hide();
				}
			
				if(uname == '')
				{
					$('#uname_error').html('* 联系人必须填写');
					$('#uname_error').show();
					return false;
				}
				else
				{
					$('#uname_error').hide();
				}
			
				if(phone=='')
				{
					$('#phone_error').html('* 手机号码必须填写');
					$('#phone_error').show();
					return false;
				}
				else if( phone.length != 11)
				{
					$('#phone_error').html('* 手机号码格式不正确');
					$('#phone_error').show();
					return false;
				}else
				{
					$('#phone_error').hide();
				}
				$.ajax({
		        url:"Sava.php",
				data:$('#messageForm').serialize(),
				type:"POST",
				success:function(data){
					 alert(data);
					 alert(typeof(data));
					  switch(parseInt(data))
					  { 
						  case 1:
						   
						   alert("留言成功");
						   location.href='../Message.php';
							break;
						  
						   default:
						   alert('留言失败');	 		
					  }
					  
					},
				error:function(e){
					 //错误的页面.
					  alert('表单提交错误');
					}
				});	
				return false;
				
			}
		
	$(".icon-back").click(function(){
		history.go(-1);
				
	})
	

	


		
	</script>
</html>

