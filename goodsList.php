<?php
//	require_once "plus/ProductType.class.php";
//	require_once "public/functions.php";
	require_once "public/init.php";
//	require_once "plus/action.class.php";
//	 $menu = $action->getProductType(" and tid='0'");
//	  var_dump($menu);
    $List = new DbMysql();
	$result=$List->select("select * from productList");
	
	?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="css/reset.css" />
			<meta charset="UTF-8">
			<link href="css/bootstrap.min.css" rel="stylesheet">
		    <link href="css/font-awesome.css" rel="stylesheet">
		    <link href="css/animate.css" rel="stylesheet">
		    <link href="css/style.css" rel="stylesheet">
			
	
			<link  rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		<title>商品分类</title>
		<style>
			html{background: #f3f4f5;}							
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;font-size: 2rem}			
		
			
			.content{background: #f3f4f5; }
			.content .problem{display:inline-block;width: 100%;height: 30px;padding: 6px;}
		    .content{box-sizing: border-box;padding: 55px 10px 80px 10px;}
		    .content .row{margin: 0;}
		    .ActiveNav li a{padding:10px;}
		    /*.thumbnail{padding-right: 1px;}*/
		    .thumbnail img{width: 80%;}
		    .caption h5{margin-top: 5px;margin-bottom: 2px;text-align: center;}
		    
			.footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0px; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
            
		</style>
	</head>
	<body>
		<header >						
					<div class="head row" style="position: fixed;z-index: 5000;">	
						<div class=" text-center">商品分类</div>
											   
					</div>
					
		</header>
		<style>
			
		    
		</style>
		<div class="content container" >
			<div class="col-lg-6" style="padding: 0;">
                    <div class="tabs-container">
                        <div class="tabs-left">
                            <ul class="nav nav-tabs ActiveNav">
                                <li class="active"><a style="min-width: 0px;" data-toggle="tab" href="#tab-1">男装 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-2">女装 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-3">美鞋 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-4">袜子  </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-5">箱子 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-6">书包 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-7">冬夏 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-8">春秋 </a></li>
                                <li class=""><a style="min-width: 0px;" data-toggle="tab" href="#tab-9">鞋袜</a></li>
                            </ul>
                            <div class="tab-content ">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">                                      
                                        <strong><a href="#" class="thumbnail"><img src="img/index/s1.jpg" alt="..."></a></strong>
                                        <?php                                       	
                                        	$menu = $action->getProductType(" and tid='35'");																	  
											foreach($menu as $rows){     
                                            $rest = substr($rows['picurl'], 3);
                                        	?>
                                        <a href="goodslist/list.php?id=<?php echo $rows["id"];?>">
                                            <div class="thumbnail col-xs-6" style="">
										     	<img class="img-rounded" src="<?php echo $rest; ?>" alt="..." style="height: 60px;">
										      <div class="caption" style="padding: 0PX;"><h5><?php echo  $rows["typename"];?></h5> </div> 
										    </div>
										</a>
                                       <?php
                                       }
                                       	?>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">                                      
                                        <strong><a href="#" class="thumbnail"><img src="img/index/s2.jpg" alt="..."></a></strong>
                                        <?php                                      	
                                        		$menu = $action->getProductType(" and tid='36'");																	  
											      foreach($menu as $rows){     
                                                  $rest = substr($rows['picurl'], 3);
                                        	?>
                                        	<a href="goodslist/list.php?id=<?php echo $rows["id"];?>">
                                                <div class="thumbnail col-xs-6">
										        <img class="img-rounded" src="<?php echo $rest; ?>" alt="..." style="height: 60px;">
										        <div class="caption" style="padding: 0PX;"><h5 ><?php echo  $rows["typename"];?></h5></div>										         
										    </div>
										    </a>
                                       <?php } ?>
                                        
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">                                       
                                        <strong><a href="#" class="thumbnail"><img src="img/index/s3.jpg" alt="..."></a></strong>                                       
                                        <?php
                                        	$menu = $action->getProductType(" and tid='39'");																	  
											foreach($menu as $rows){     
                                            $rest = substr($rows['picurl'], 3);
                                        ?>
                                        <div class="thumbnail col-xs-6">
										    <img class="img-rounded" src="<?php echo $rest; ?>" alt="..." style="height: 60px;">
										      <div class="caption" style="padding: 0PX;"><h5><?php echo  $rows["typename"];?></h5></div> 
										</div>
                                       <?php
                                       }
                                       	?>

                                        
                                    </div>
                                </div>
                                
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
			
			
			
		</div>
		<!--底部-->
		<footer class="row footer">
			<ol class="ff" style="margin-top: -10px;">
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.metisMenu.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>

    <script src="js/inspinia.js"></script>
    <script src="js/pace.min.js"></script>
	<script type="text/javascript">
		
		
	</script>
</html>
