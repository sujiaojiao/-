<?php
	require_once 'islogin.php';
	?>
<!DOCTYPE html>
	<html>
		<head>
			<meta  charset="utf-8" />
			<title>无标题文档</title>	
			<!--<script src="../js/prototype.lite.js" type="text/javascript"></script>
			<script src="../js/moo.fx.js" type="text/javascript"></script>
			<script src="../js/moo.fx.pack.js" type="text/javascript"></script>		-->
		<style>
		body {
			font:12px Arial, Helvetica, sans-serif;
			color: #000;
			background-color: #EEF2FB;
			margin: 0px;
		}
		*{padding: 0;margin: 0;}
		#container {
			width: 182px;
		}
	
		
		
		li{list-style: none;}
		.Uli{width: 182px;height: 26px;line-height: 26px;background-image: url(../images/menu_bg1.gif);background-repeat: no-repeat;}
		.imgZH{transition: 1s;width: 10px;height: 10px;display: inline-block; margin-left:40px;margin-right: 6px;background: url(../images/menu_bg22.png);background-size: 100% 100%;}
		.active{transform-style: preserve-3d;transform: rotateZ(90deg);transition: 1s;}		
		.active1{transform-style: preserve-3d;transform: rotateZ(-90deg);transition: 1s;}	
		
		.MM{list-style: inherit;width: 182;display: none;}
		.MMAC{list-style: inherit;width: 182;transition: border-left-width;0.3s}
		.MM li{width: 182;height: 26px;line-height: 26px;margin-right: 6px;background: url(../images/menu_bg1.gif);background-repeat: no-repeat;}
		.MM li a{margin-left: 60px;text-decoration: none;}
		.MMCC{width:162px;height:26px;background: pink;}
		.MM a:link {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			line-height: 26px;
			color: #333333;
			/*background: blue;*/
			
			/*background-image: url(../images/menu_bg1.gif);*/
			/*background-repeat: no-repeat;*/
			height: 26px;
			width: 182px;
			display: block;
			text-align: center;
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			text-decoration: none;
			/*background: pink;*/
		}
		.MM a:visited {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			line-height: 26px;
			color: #333333;
			
			/*background-image: url(../images/menu_bg1.gif);*/
			/*background-repeat: no-repeat;*/
			display: block;
			text-align: center;
			margin: 0px;
			padding: 0px;
			height: 26px;
			width: 182px;
			text-decoration: none;
			/*background: pink;*/
		}
		.MM a:active {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			line-height: 26px;
			color: #333333;
			background: blue;
			/*background-image: url(../images/menu_bg1.gif);*/
			/*background-repeat: no-repeat;*/
			height: 26px;
			width: 182px;
			display: block;
			text-align: center;
			margin: 0px;
			padding: 0px;
			overflow: hidden;
			text-decoration: none;
			background: pink;
		}
		.MM a:hover {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			line-height: 26px;
			font-weight: bold;
			color: #006600;
			background: palevioletred;
			/*background-image: url(../images/menu_bg2.gif);*/
			background-repeat: no-repeat;
			text-align: center;
			display: block;
			margin: 0px;
			padding: 0px;
			height: 26px;
			width: 182px;
			text-decoration: none;
		}
		</style>
		</head>
	<body>
	<div id="#container">
		
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>网站常规管理</span></li>
			<ol class="MM">
			    <li ><a href="config.php" target="main">基本设置</a></li>       
		        <!--<li ><a  href="links.php" target="main">友情链接</a></li>-->
			</ol>						
		</ul>
		
		<!--<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>文章管理</span></li>		
			<ol class="MM">
			    <li ><a href="articleList.php" target="main">文章分类</a></li>       
		        <li ><a href="article.php" target="main">文章管理</a></li>
			</ol>				
		</ul>-->
		<!--<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>售前咨询</span></li>		
			<ol class="MM">
			    <li ><a href="consultType.php" target="main">咨询分类</a></li>       
		        <li ><a href="consult.php" target="main">咨询内容</a></li>
			</ol>				
		</ul>
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>商品评论</span></li>		
			<ol class="MM">
			    <li ><a href="assess.php" target="main">商品评论</a></li>       
		        
			</ol>				
		</ul>-->
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>商品管理</span></li>		
			<ol class="MM">
			    <li ><a href="product_pp.php" target="main">商品品牌</a></li>       
		        <li ><a href="productList.php" target="main">商品分类</a></li> 
		        <li ><a href="ProductMng.php" target="main">商品管理</a></li> 
		        <li ><a href="assess.php" target="main">商品评论</a></li>      
		        <li ><a href="dingdan.php" target="main">订单管理</a></li> 
			</ol>				
		</ul>
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>留言管理</span></li>		
			<ol class="MM">
			    <li ><a href="feedbackType.php" target="main">留言分类</a></li>       
		        <li ><a href="feedback.php" target="main">留言内容</a></li>       
			</ol>				
		</ul>
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>用户管理</span></li>		
			<ol class="MM">
			    <li ><a href="user.php" target="main">会员管理</a></li>  
			     <?php
		        	if($_SESSION["rights"]==1){
		        ?>     
		        <li ><a href="admin.php" target="main">管理员管理</a></li>
		        <?php
	        		}
	            ?>
		        <li ><a href="admin_pwd.php" target="main">修改密码</a></li>       
		        <li ><a href="log.php" target="main">后台登陆日志</a></li>          
			</ol>				
		</ul>
		<ul class="ul" style="margin-top: 4px;margin-left: 5px;">
			<li class="Uli"><img class="imgZH" /><span>其他管理</span></li>		
			<ol class="MM">
			    <li ><a href="receive.php" target="main">收货地址</a></li>       
		        <li ><a href="favorites.php" target="main">收藏商品</a></li>
		             
			</ol>				
		</ul>
	</div>
	<script src="../js/jquery-3.0.0.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">

		$(".Uli").on('click',function(){
			$(this).siblings('.MM').fadeToggle(500);
			$(this).parents('.ul').siblings('.ul').children('.Uli').children('.imgZH').removeClass('active');
			$(this).children('.imgZH').toggleClass("active");
			
			$(this).children('.MM').toggleClass("MMAC");			
			$(this).parents().siblings().children('.MM').hide();				
			$(this).parents().siblings().children('.imgZH').show();
		})
		$(".MM li a").on("click",function(){	
			
			$(this).parents("li").siblings('li').children('a').removeClass("MMCC");	
			$(this).addClass("MMCC");

		})      
   </script>	     
	</body>
</html>