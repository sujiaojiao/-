<?php
	
	require_once "public/init.php";
	$sql="select * from feedback";
	
	$parm=" where 1 ";
	$parm.=" and issh=1";
	$sql.=$parm." order by id desc ";
//	var_dump($sql);
//	echo $sql;
	$db->sql($sql);
	$infocount=$db->affected();
	$pagesize=10;
	
	$page= new page($infocount, $pagesize);
	
	$sql.=$page->limit();
//
	$list=$db->select($sql);
//   var_dump($list);
	?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		<title>留言板</title>
		<style>
			html{background: #f3f4f5;}							
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;font-size: 2rem}			
			
			
			.content{background: #f3f4f5;padding-top: 80px; }
			
	
			.footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
	</head>
	<body>
		
		<header>
			<div class="head row" style="position: fixed;z-index: 5000;">	
				<div class=" text-center">留言板</div>
				<div style="position: absolute;top: 0;right: 15px;">
					<a href="Message/addNewM.php" style="color: #DDDDDD;font-size: 1.2rem;">添加新留言&nbsp;</a> 
				</div>							   
			</div>
		</header>
		<style>
			.content .problem{display:inline-block;width: 100%;height: 30px;padding: 6px;}
		    .content{box-sizing: border-box;padding: 55px 10px 80px 10px;}
		   .content .row{margin: 0;}
		    .content ul li .perlist{width:100%;height: 30px;line-height: 30px;border-radius: 10px;}
		    .everybody .per{background: red;}
		    .everybody .timee{background: green;}
		</style>
		<div class="content container" >
			<ul class="row">
				<!--<img style="padding: 10px 0pt 16px 10px;" src="<?php echo $webdir;?>images/message_board01.jpg" alt="常见问题" height="80" width="130">-->
				<a href="" class="problem">常见问题</a>
				<?php
					 foreach($list as $rows){
					?>
				<li class="panel panel-success">
					<div class="panel-heading">
					   <h3 class="panel-title">
					   	<span class="iconfont icon-login"><?php echo $rows["usernameshow"]?></span>
					   	<span style="float: right;color: #666666;font-size: 1.3rem;"> <?php echo date("Y-m-d H:i:s",$rows["addtime"]);?></span>
					   </h3>
					</div>
				    <div class="panel-body">			    
					    <div><?php echo $rows["content"]?></div>
					    <div class="" style="margin-top: 6px;color: orange;">
					    	<span class="iconfont icon-huifu" ></span>
					    	<span> <?php
                                    if($rows["ishf"]==0){
                                        echo "请等待回复；";
                                    }else{
                                        echo "管理员回复：{$rows["recontent"]}";
                                    }
                                   ?>
                            </span>
					   </div>
					    
					</div>
								 
				</li>
				<?php
					 }
					?>

			</ul>
			
			
		
			
			
			
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
	<script type="text/javascript">
		$(function(){
			$(".xz").click(function(){
			window.location.href = "user/user_Edit.php";
			})
			$(".xm").click(function(){
				window.location.href = "user/user_Password.php";
			})
			$(".sh").click(function(){
				window.location.href = "user/user_receive.php";
			})
		})
		
	</script>
</html>
