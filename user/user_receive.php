<?php
    require_once "../public/init.php";

	$userinfo = new UserInfo();
	$zt = $userinfo->isok();
	
	$receive= new receive();
	$tj=" and username='".UID."' ";
	$info= $receive->receiveList($tj);
		
//	var_dump($info);
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
		    /*#userPassword .row{margin: 0;box-sizing: border-box;padding:0px 15px;}
		    .btn{background:#AAAAAA ;color: #666666;}
		   .bc .btn:hover{background: #D00878;color: #fff;}
		   
		 
		    .successWarp{display: none; text-align:center; width: 80%;height: 150px;background: #D00878;position: absolute;left: 0;right: 0;top: 100px;margin: auto;z-index: 1000;}
		    .successWarp h3{color: #fff;}*/
		   .panel-body .operate{width:100%;height: 40px;float: right;border-top:1px solid #EFEFEF;overflow: hidden;margin-top: 8px;}
		   .panel-body .operate a{border: 1px solid #999999;padding: 4px 8px;margin-right: 4px;color: #D00878;}
		</style>
	</head>
	<body id="userPassword" style="background: #DDDDDD;">
		<header>
			<span class="iconfont icon-back"></span>
			<p >地址管理</p>
			
		</header>
		<?php
			foreach($info as $rows){
			?>
        <div class="panel panel-default" style="margin: 12px 0px;">		 
			<div class="panel-body">
			    <p style="overflow: hidden;">
			    	<span  style="margin-right: 16px;"><?php echo $rows["shren"]?></span><span class=""><?php echo $rows["mobile"];?></span>
			        <article><?php echo $rows["shdizhi"];?></article>
			        <div style="margin-top: 6px;"><?php echo $rows["youbian"];?></div>
			         <div class=" operate">
			         	<div style="float: right;margin-top: 14px;">
			         		<a href="user_receive_edit.php?id=<?php echo $rows["id"];?>">编辑</a><a href="user_receiveSava.php?action=del&id=<?php echo $rows["id"];?>">删除</a>
			         	</div>
			         	
			         </div>
			    </p>
			</div>
					 
		</div>
		<?php
			}
			?>
			 
			<div class="panel panel-danger newadd" style="height: 40px;line-height: 40px;color: #D00878;">
			    <span class="col-xs-6">添加收货地址</span><span class="col-xs-6 text-right iconfont icon-fanhuidingbujiantou"></span>
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
			$(".newadd").click(function(){
				window.location.href = "user_receive_add.php";
			})
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
