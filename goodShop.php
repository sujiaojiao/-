
<?php
	require "public/init.php";
?>

<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		<title>分类</title>
		<style>
			*{margin: 0;padding: 0;}
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;font-size: 2rem}			
								
			#userPassword header{height: 50px; width: 100%;background: #DDDDDD;position: relative;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 100%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
	
		</style>
	</head>
	<body id="userPassword" style="background: #f3f4f5;">
		<header>
			<div class="head row" style="position: fixed;z-index: 5000;">	
				<div class=" text-center">好店-品牌</div>
											   
			</div>
		</header>
		<!--<header >						
					<div class="head row" style="position: fixed;z-index: 5000;">	
						<div class=" text-center">商品分类</div>
											   
					</div>
					
		</header>-->
		
		<style>
			
		   
		   .content{box-sizing: border-box;padding: 0 4px 0px 4px;}
		   .content .row{padding:6px 0px;margin: 0;}
		   .content .num{margin-top: 4px;padding: 2px 2px 1px 2px;border: 0;height: 270px;}
		   .content .thumbnail img{width: 100%;height: 150px;}
		   .content .num a{color: #666666;padding: 0;text-decoration: none;}
		   .content .num .p_text{height: 18px;line-height: 18px;text-align: center;}
		  
		   .content .num h6{box-sizing:border-box;padding: 0 0 0 10px;margin-top: 6px;color: #D00878;}
		    
		    .footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
		

		<div class="content" >			
			<ol class="row">                            
				<?php
				$ppInfo=$action->getPP(' and recommend=\'1\'');
				foreach($ppInfo as $rows){				
				   $rest = substr($rows['picurl'], 3);				
				?>
				<li class="col-xs-6 col-md-3 num">
					<a href="goodslist/shop.php?ppid=<?php echo $rows["id"];?>" class="thumbnail">
						<img src="<?php echo $rest;?>" alt="...">
						<div class="p_text">
							 <h6><?php echo $rows["ppname"];?></h6>
						</div>
							      
					</a>
				</li>
				<?php
					}
				?>		
				</ol>
				
			
		</div>
		<!--底部-->
		<footer class="row footer">
			<ol class="ff">
				<li class="foot text-center">
					<a href="index.php">
					<div class="iconfont icon-shouyeshouye">
						<p>首页</p>
					</div>
					</a>
				</li>
				<li class="foot text-center">
					<a href="goodsList.php">
					<div class="iconfont icon-fenlei">
						<p>分类</p>
					</div>
					</a>
				</li>
				<li class=" foot text-center">
					<a href="goodShop.php">
					<div class="iconfont icon-haodian">
						<p>好店</p>
					</div>
					</a>
				</li>
				<li class=" foot text-center">
					<a href="Message.php">
						<div class="iconfont icon-quanzi"><p>圈子</p></div>

					</a>
				</li>
				<li class=" foot text-center">
					<a href="user_main.php">
						<div class="iconfont icon-wode"><p>我的</p></div>
					</a>
	
				</li>
			</ol>
		</footer>
	
	
	</body>
	<script src="js/jquery-3.0.0.js"></script>
	<script src="js/global.js"></script>
	<script type="text/javascript">
		
	</script>
</html>

