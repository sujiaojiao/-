<?php
   require_once "public/init.php";
?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="css/reset.css" />
			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/animate.css" />
			<link rel="stylesheet" href="css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		<title>我的</title>
		<style>
			html{background: #f3f4f5;}							
			.head{width: 100%;height: 50px;line-height: 50px;background: url(img/login/top_bgline.png) repeat-x;font-size: 2rem;font-family:"微软雅黑";color:#FFFFFF;}			
		  
			
			.content{background: #f3f4f5; }
			.content .persons{width: 100%;height: 150px;background: url(img/user/userbg.jpg);background-size:100% 100% ;}
			/*background:#d3137b ;*/
			.content .meng{width: 100%;height: 100%;background: rgba(0,0,0,0.3);color: #FFFFFF;}
			.content .person_pic{font-size: 3.8rem;}
			/*a{color: #efefef;}*/
			.content .ding{height:32px;line-height: 32px;background: #fffefe;font-size: 1.2rem;border-top: 1px solid #DDDDDD;border-bottom: 1px solid #DDDDDD;}
			
			.personalList {margin-top: 10px;background: #fff;}
			.personalList ul li{border-bottom: 1px solid #DDDDDD;height: 40px;line-height: 40px;overflow: hidden;}
			.personalList ul li>span{display: inline-block;height: 40px;}
			.personalList ul li>span:nth-child(1){width: 3rem;text-align: center;vertical-align: middle;} 
			.personalList ul li>span:nth-child(1) .iconfont{font-size: 2.5rem;line-height: 35px;}
			.personalList ul li>span:nth-child(2){background: orange；}
			.personalList ul li>span:nth-child(3){color: #999999;float: right;margin-right: 4%;}
			.user_main_varityxin{position: fixed;width: 100%;height: 82vh;background: url(img/user_bg.jpg);background-size: cover;top: 48px;z-index: 555;display: none;}
			.guan{width: 30px;height: 30px;border-radius: 50%;display: inline-block;background:rgba(0,0,0,0.4);font-size: 3rem;line-height: 30px;float: right;margin-right: 3%;}	
			
			
			.cardWarp{width: 100%;box-sizing: border-box;padding: 15px;}
	    	.cardWarp .cardBox{width: 100%;height: 150px;background: #D00878;border-radius:8px;}
	        .cardWarp .cardBox .cardBoxTop{width: 100%;height: 100px;box-sizing: border-box;padding: 15px;}
	        .cardWarp .cardBox .cardBoxTop img{width: 50px;height: 50px;border-radius:50% ;float: left;}
	        .cardWarp .cardBox .cardBoxTop .info{float: left;box-sizing: border-box;padding:8px 15px;}
	        .cardWarp .cardBox .cardBoxTop .info .span1{color: #fff;}
	        .cardWarp .cardBox .cardBoxTop .info .span2{color: #fff;font-size: 0.8rem;line-height: 25px;}
	        .cardWarp .cardBox  .cardBoxBottom{line-height: 60px;border-top:1px solid #fff;color: #fff;box-sizing: border-box;padding-left: 15px;}
			

			.footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
	</head>
	<body>
		<header class="container">			
				<div class="row ">
					<div class="head">	
						<div class="col-xs-12 text-center">个人信息</div>
						
					   
					</div>
				</div>			
		</header>
		<div class="content" >
			<div class="persons">
				<div class="col-xs-12 text-center meng" >
					<div class="iconfont icon-weibiaoti2 person_pic" style="padding-top: 20px;"></div>
					<?php
		            if(!ISLOGIN){
				  ?>
				<div class="col-xs-12">
				<a href="<?php echo $webdir;?>login.html">登 录 </a> |
				  <a  href="<?php echo $webdir;?>loading.html"> 注 册</a></div>
				<?php
				    }else{
				?>
				<div >您好，<a href="<?php echo $webdir;?>index.php"><?php echo UID;?></a> 
					<a href="<?php echo $webdir;?>user/loginOut.php" class="a-logout">退出登录</a>
				</div>
				<?php
				  }
				?>
					<!--<div class="col-xs-12"><a href="">登陆</a> <a href="">注册</a>  </div>-->
				</div>
			</div>
			<div class="personal_del clearfix" >
				<div class="col-xs-4 text-center shoucang" style="background: #fffefe;">
					<span class="iconfont icon-shoucang "></span>
					<p>我的收藏</p>
				</div>
				<div class="col-xs-4 text-center  gouwuche" style="background: #fffefe;">
					<span class="iconfont icon-gouwuche1 "></span>
					<p>购物车</p>
				</div>
				<div class="col-xs-4 text-center jifenf" style="background: #fffefe;">
					<span class="iconfont  icon-dingdan "></span>
					<p>我的积分</p>
				</div>
				<div  class="user_main_varityxin jifenz text-center animated rollIn">
		    		<span class="guan animated">×</span>
		    		<h3 style="color: #D00878;"><span class="iconfont icon-dingdan" style="font-size: 3rem;color: green;"></span>我的积分 </h3>
		    		<div class="cardWarp">
						<div class="cardBox">
							<div class="cardBoxTop">
							    <img src="img/hotfood5.jpg"/>
							    <div class="info">
							    	<span class="span1">轩贝童装</span><br />
							    	<span class="span2">手机版会员卡</span>
							    </div>
						    </div>
						    <div class="cardBoxBottom">
						    	9855 4223 5210 20
						    </div>
						</div>
					</div>
				
		    		<p >积分  <span style="color: #D00878;">56</span></p>
		    			
		    		<p class="text-left" style="margin: 10px 12px;padding: 0 0 10px 0;font-family:'微软雅黑';border-bottom: 1px solid #DDDDDD;">个人优惠特选</p>
		    	    <p class="text-left" style="margin: 10px 12px;padding: 0 0 10px 0;font-family:'微软雅黑';border-bottom: 1px solid #DDDDDD;">会员卡详情</p>
		    	    <p class="text-left" style="margin: 10px 12px;padding: 0 0 10px 0;font-family:'微软雅黑';border-bottom: 1px solid #DDDDDD;">适用门店</p>
		    	  <!--  <p class="text-left" style="margin: 10px 12px;padding: 0 0 10px 0;font-family:'微软雅黑';border-bottom: 1px solid #DDDDDD;">公众号</p>-->
		    	</div>
				<div class="col-xs-12  ding" style="">
					
					<span class="text-left">我的订单</span><span style="float: right;color: #999999;">查看全部订单 ></span>
				</div>
				
			</div>
			
		    <div class="personalList">
		    	<ul>
		    		<li class=" dingf"><span><span class="iconfont icon-qita" style="font-size: 3rem;color: green;"></span></span><span>订购热线</span><span>></span></li>
		    		<div class="user_main_varityxin dingz text-center animated rollIn">
		    			<span class="guan animated">×</span>
		    			<h3 style="color: #D00878;"><span class="iconfont icon-qita" style="font-size: 3rem;color: green;"></span>订购热线 </h3>
		    			<p >热线1：0375-8382358</p>
		    			<p >热线2：0377-8382377</p>
		    			<p >热线3：010--6357682</p>
		    			<p class="text-left" style="margin: 20px 12px;font-family:'微软雅黑';">欢迎订购轩贝童装商品,如果有什么问题请及时与我们联系！认真做好童装，为您和孩子绽放青春！</p>
		    		</div>
		    		<!--<li><span><span class="iconfont icon-lianxikefu" style="color: green;"></span></span><span>联系客服</span><span>></span></li>-->
		    		<li class="gongzhongf"><span><span class="iconfont icon-shezhizhongxin" style="font-size: 3rem;color: purple;"></span></span><span>公众号</span><span>></span></li>
		    		<div class="user_main_varityxin gongzhongz text-center animated rollIn">
		    			<span class="guan animated">×</span>
		    			<h3 style="color: #D00878;">公众号 </h3>
		    			<p ><img style="width: 50%;height: 50%;" src="img/ma.png"></p>
		    			
		    		</div>
		    		<li class="sh"><span><span class="iconfont icon-shouhuodizhi" style="color: blue;"></span></span><span>收货地址</span><span>></span></li>
		    		
		    		
		    		<!--<li><span><span class="iconfont icon-qita" style="font-size: 3rem;color: deepskyblue;"></span></span><span>其他操作</span><span>></span></li>-->
		    	    <li class="xz"><span><span class="iconfont icon-shezhizhongxin" style="font-size: 3rem;color: purple;"></span></span><span>修改资料</span><span>></span></li>
		    		<li class="xm"><span><span class="iconfont icon-shouhuodizhi" style="color: blue;"></span></span><span>修改密码</span><span>></span></li>
		    		<li ><span><span class="" style="font-size: 3rem;color: purple;"></span></span><span></span><span></span></li>
		    		
		    	</ul>
		    </div>
		
			
			
			
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
			$(".gouwuche").click(function(){
				window.location.href = "ajax/cart.php";
			})
			$(".ding").click(function(){
				window.location.href = "ajax/orderCat.php";
			})
			$(".shoucang").click(function(){
//				window.location.href = "ajax/favorite.php";
			})
			
			$(".dingf").click(function(){
				$(".dingz").show();
				
			})
			$(".guan").click(function(){
				setTimeout(function(){
					$(".dingz").fadeOut();
				},1000);		
			})
			$(".jifenf").click(function(){
				$(".jifenz").show();
				
			})
			$(".guan").click(function(){
				setTimeout(function(){
					$(".jifenz").fadeOut();
				},200);		
			})
			$(".gongzhongf").click(function(){
				$(".gongzhongz").show();
				
			})
			$(".guan").click(function(){
				setTimeout(function(){
					$(".gongzhongz").fadeOut();
				},200);		
			})
		})	
		
		
			
		
	</script>
</html>
