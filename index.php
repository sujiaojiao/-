<?php
require_once "public/init.php";

$userinfo = new UserInfo();
$userinfo = new UserInfo();
$zt = $userinfo->isok();

  $action->getArticle();
  

	$sql="select * from productList ";
	$listInfo=$db->select($sql,1);
	if(empty($listInfo))
	{
	    weberror();
	}
	
	$menu=$listInfo["idpath"];
	$weizhi=$action->getWeizhi($listInfo["idpath"]);
	$xjid=$db->select("select id from productList where idpath like '%$menu%'");
	$xjids=0;
	
	 
	
	
	foreach($xjid as $k=>$v)
	{
	  $xjids.=",".$v["id"];   
	}
	
	$tid=$listInfo["tid"];
	if($tid!=0)
	{
	    //echo $listInfo["idpath"];
	    $tids=explode("_", $listInfo["idpath"]);
	    $tid=$tids[1];
	}else
	{
//	    $tid=$id;
	}
	 
	$sql="select title,id,price,yprice,picurl from product";
	$parm=" where 1";
	$parm.=" and (typeid in($xjids))"; 
	
	
	
	//条件增加
	
	$attr=@$_GET["attr"];
	
	switch ($attr) {
	    case 1:
	    $parm.=" hot='1' ";
	
	        break;
	   case 2:
	        $parm.=" and recommend='1' ";
	        break;
	  case 3:
	        $parm.=" and drops='1' ";
	         break;
	    default:
	        $attr=0;
	        break;
	}
	
	$sql.=$parm;
	
	//排序方式
	
	$order=@$_GET["order"];
	switch ($order) {
	    case 1:
	      $sql.=" order by hits desc ";  
	        break;
	case 2:
	   $sql.=" order by id desc ";
	    break;
	case 3:
	    $sql.=" order by price desc ";
	    break;
	case 4:
	    $sql.=" order by price ";
	    break;
	    default:
	      $order=2;
	     $sql.=" order by id desc ";
	      break;
	}
	
	
	
	
	$db->sql($sql);
	$infocount=$db->affected();
	$pagesize=20;
	$page = new page($infocount,$pagesize);
	$sql.=$page->limit(); 
	$result=$db->select($sql);
  
  
?>
<!DOCTYPE html>
<html>
	<head>		
		<meta charset="UTF-8">	
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!---->
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link  rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		
		<title>轩贝商城</title>
		<style>
			html{overflow: scroll;}
			body{font-family: "微软雅黑"; overflow: scroll;}
			.head{position: fixed;top: 0;margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;font-size: 2.2rem}			
			/*header{width:100%;height: 60px;background:  url(img/login/top_bgline.png) repeat-x;position: fixed;top: 0;z-index: 555;}*/
		
			/*header .logoTitle>div{ line-height: 57px;padding:0 15px ;}
		    header .logoTitle .row>div:nth-child(1){font-size: 1.8rem;color: #fff;font-weight: 600;}*/
			.icon-sousuo{font-size: 2.4rem;color: #fff;font-weight: 600;}
          
            .swiper-container{height: 180px;width: 100%;margin-top: 50px;}
            .swiper-container img{width: 100%;height: 100%;}
            .goTop{display: block; width: 40px;height: 40px;border-radius:50%;background: rgba(0,0,0,0.4);position: fixed;right: 5px;bottom: 80px;text-align: center;line-height: 40px;color: #fff;z-index: 666;}	
            
            .content{background: #f1eeee;}
            .content ul{padding: 4px;}
            .content ul li{height: 250px;padding: 0;border:0.1rem solid #E1E5EE;}
            .content ul li img{width: 99%;height: 80%;}	
            .content ul li h6{font-size: 1rem;}
            .footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
	</head>
	<body>
		<!--<header >			
			<div class="logoTitle">
				<div class="row">
					<div class="col-xs-6">
						轩贝商城
					</div>
					<div class="col-xs-6 text-right">
						<span class="iconfont icon-suo1"></span>
						<span class="iconfont icon-sousuo"></span>							
					</div>
				</div>
			</div>					
		</header>		-->
		<header>
			<div class="head row" style="position: fixed;z-index: 5000;">	
				<div class=" text-center">轩贝商城</div>
				<div style="position: absolute;top: 0;right: 15px;">
					<span class="iconfont icon-sousuo"></span>		 
				</div>							   
			</div>
		</header>
							
		<div class="swiper-container">
		    <div class="swiper-wrapper">
		        <div class="swiper-slide"><img class="pic" src="img/index/s1.jpg"></div>
		        <div class="swiper-slide"><img class="pic" src="img/index/s2.jpg" /></div>
		        <div class="swiper-slide"><img class="pic" src="img/index/s3.jpg" /></div>
		        <div class="swiper-slide"><img class="pic" src="img/index/s4.jpg" /></div>
		    </div>
		    <div class="swiper-pagination"></div>
		</div>
		<span class="goTop">Top</span>
		<!--<div>
			
		</div>-->
		<style>
		  .news-tab{width: 100%;height: 60px;line-height: 70px;background: #f1eeee;margin-left: 0;margin-right: 0;margin-bottom: 0px;}
		  .tabnow a{width: 100%;height: 50px;background: pink;display: inline-block;line-height: 50px;border-radius: 8px;color: #D00878;}
		  .news-tab-a{text-decoration: none;}
		  .news-tab-a:hover{text-decoration: none;}
		</style>	
		<ol class="row news-tab">
		
			<?php
//		    $list=$action->getArticle(' and typeid=12 ');
//		    foreach($list as $rows){      
//					echo "<li class='col-xs-3 '><h5 class='news-tab-h2 tabnow'><a href=\"\" >".$rows["title"];"</a></h5></li>";
//					 
//		    }
		    ?>

	      


				<div class="col-xs-4 " style="padding: 0 3px 0 3px;">
					 <h5 class="news-tab-h2 tabnow text-center">
					 	<a class="news-tab-a" href="<?php echo $page->pageurl2('order');?>1" class="order-but <?php if($order==1) echo "down"?>">关注</a>

					</h5>
				</div>
				<div class="col-xs-4 " style="padding: 0 3px 0 3px;">
					 <h5 class="news-tab-h2 tabnow text-center">
					 	<a class="news-tab-a" href="<?php echo $page->pageurl2('order');?>2" class="order-but <?php if($order==2) echo "down"?>">新品</a>
						
					</h5>
				</div>
				<div class="col-xs-4 " style="padding: 0 3px 0 3px;">
					 <h5 class="news-tab-h2 tabnow text-center">
					 	<a class="news-tab-a" href="<?php echo $page->pageurl2('order');?>3" class="order-but <?php if($order==3) echo "down"?><?php if($order==4) echo "up"?>">价格</a>
					
					</h5>
				</div>
		</ol>
		<div class="content container">
			
			<ul class="row" style="margin-bottom: 0px;">
				<?php
							 	if($result){
							 foreach($result as $rows)
							 {
							 	$rest = substr($rows['picurl'], 3);
							 	?>
				<li class="col-xs-6 center-block">
					<a style="" href="goodslist/show.php?id=<?php echo $rows["id"];?>"> <img src="<?php echo $rest;?>" alt="..."></a>
					<div style="margin-top: 3px;"><span> <strong style="color: red;"><?php echo $rows["price"];?></strong> </span><span style="color: #999;margin-left: 4%;text-decoration: line-through;font-size: 0.6rem;"><?php echo $rows["yprice"];?></span>
						<h6 style="color: #D00878;margin-top: 3px;"><?php echo $rows["title"];?></h6>
					</div>
					
					
				</li>
				
				
				<?php
					
								}}else{
							     echo "暂无数据";
							 	}
					?>
					
			</ul>
			<div style="width: 100%;height: 42px;"></div>
		</div>				
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
	<script src="js/swiper-3.3.1.min.js"></script>
	<script>
		var mySwiper = new Swiper('.swiper-container',{
		pagination : '.swiper-pagination',
		autoplay : 1000,
			loop:true,
		   autoplayDisableOnInteraction : false,//pagination : '#swiper-pagination1',
		})
		$(".icon-sousuo").click(function(){
				location.href='search.php';
			})
			$(".icon-suo1").click(function(){
//				location.href='loading.html';
			})
		$(function() {
	 $(".goTop").hide();
      $(window).scroll(function() {
        if ($(window).scrollTop() > 30) {
          $(".goTop").fadeIn(500);
        } else {
          $(".goTop").fadeOut(500);
        }
      });
      //当点击跳转链接后，回到页面顶部位置
      $(".goTop").click(function() {
        $('body,html').animate({
          scrollTop: 0
        },
        800);
        return false;
      });
    });

	</script>
</html>
