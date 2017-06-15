<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">	
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title><?php echo $title;?> - <?php echo $webname;?></title>
		
		<style>
			a{text-decoration: none;}
			header {font-size: 1.8rem;font-weight: 600;width: 100%;height: 50px;background: #DDDDDD;line-height: 50px;text-align: center;}
		</style>
	</head>
	<body>
		<header class="container">
			<?php echo $title;?>
				
			</header>
			
		
		<div class="main" style="text-align: center;">
		        <h2 class="title">
		        	<!--<?php echo $title;?>-->		
		        </h2>
		        <div class="member_box_2">
		          <p class="notice">
		          	<?php echo $info;?>		           
		           </p>
		          <p class="button"><a href="<?php echo $url;?>">返回</a></p>	           
		           
	            </div>
	    </div>
	</body>
</html>
