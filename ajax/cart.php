<?php
  	require_once "../public/init.php";
	
	$cart = new cart();
	$cart->cartInfo();
//	var_dump($_SESSION["productCart"]);
//	echo $_SESSION["cartCount"];
//	echo $_SESSION["cartPrice"];
	$action=@$_GET["action"];
	
	if($action=="up")
	{
	    $id=$_GET["id"];
	    $sum=$_GET["sum"];
	    if($sum==0){
	        $cart->delCart($id);
	        webAlter("Success",'cart.php');
	    }
	    $cart->addCart($id, $sum);
	    
	    webAlter("Success",'cart.php');
	}
	
	$cartList=$cart->cartInfo();
//	
//	 
//	
//	
	if(!ISLOGIN)
	{
	    webAlter("请先登陆", "../login.html");
	    exit;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>购物车</title>
		<style>
			html{background: #f3f4f5;}							
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(../img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;}			
		    .head .icon-back{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
			
			.content{background: #f3f4f5; }
			
	
			.footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
	</head>
	<body>
		<header class="">		
				
					<div class="head row" style="position: relative;">	
						<span class="iconfont icon-back"></span>
						<div class="iconfont icon-gouwuche1 text-center">我的购物车</div>
						<div class="" style="position: absolute;top: 0;right: 15px;">
							<!--<a href="Message/addNewM.php" style="color: #DDDDDD;">添加新留言&nbsp;</a>--> 
						</div>
					   
					</div>
					
		</header>
		<style>
			.content .problem{width: 100%;height: 30px;padding: 6px;color: red;font-size: 1.15rem}
		    .content{box-sizing: border-box;padding: 0 10px 80px 10px;}
		   .content .row{margin: 0;}
		    .content ul li .perlist{width:100%;height: 30px;line-height: 30px;border-radius: 10px;}
		    .content .panel-body #np{font-size: 1.2rem;color: red;box-sizing:border-box;padding: 2px 8px 0px 10px;}
		   .content .panel-body #yp{text-decoration: line-through;font-size: 1rem;}
		    .content .addnumBtn button{width: 16px;line-height: 20px;}
		    .everybody .per{background: red;}
		    .everybody .timee{background: green;}
		    .content .cart_img {width:28% ;height: 80px;float:left;}
		    .footer{width:100%;margin:0 auto;background:#f1eeee;position: fixed;bottom: 36px; }
            .ff .foot{height: 52px;float: left;line-height: 52px;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
             a{color: #333333;text-decoration: none;}
            .ff .foot span{font-size: 1.6rem;color: #333333;}
            .ff .totle_money{height: 20px;width: 100%;margin:6px 0 10px 0;}
		</style>
		<div class="content container" >
			<ul class="row">
				<p class="problem">提示 :请及时下单购买，商品价格以订单提交时的 价格为准</p>
				 <?php
          if(!empty($cartList))
          {
              foreach($cartList as $k=>$v)
              {
          ?>
				<li class="panel panel-success">
					
				    <div class="panel-body">			    
					    <div>
					    	<a href="../goodslist/show.php?id=<?php echo $k;?>" alt="" target="_blank">
					    		<img src="<?php echo str_replace("", "",$v["picurl"])?>" alt="" class="cart_img" />
					    	</a>
					    	
					    	<div style="float: left;width:68%;height: 80px;margin-left: 4%;">
					    		<p style="margin: 0;">
					    			<a style="color: #222;" href="../goodslist/show.php?id=<?php echo $k;?>"><?php echo $v["title"]?></a>
					    		</p>
					    		<span id="np"><strong>¥<?php echo $v["unitPrice"]?></strong></span>
					     		<span id="yp" style="">¥<?php echo $v["yPrice"]?></span>
					     		<div class="addnumBtn" style="margin-top: 3px;">
					     			<a id="btn1" href='?action=up&id=<?php echo $k;?>&sum=<?php echo $v["total"]-1;?>' alt="-"><button  type="button">-</button></a>
									<input id="numm"  size="4" name="buy_quantity" ref="do/items/add/1206014002/1"  value="<?php echo $v["total"]?>" type="text" style="text-align: center;"/>
									<a id="btn2" href='?action=up&id=<?php echo $k;?>&sum=<?php echo $v["total"]+1;?>' alt="+"><button  type="button">+</button></a>
					     			
									
									<span id="delBtn" onclick="del(<?php echo $k;?>)"  class="iconfont icon-shanchu" style="font-size: 2.3rem; float: right;"></span>
					     		</div>
					    	</div>
					    </div>
					</div>
								 
				</li>
                 <?php
              }      
          } else{
          ?>
	            <div class="panel-heading" id="nothing_none" style="display: none;">
					 <h3 class="panel-title text-center">购物车空空如也，赶紧去购物吧！</h3>
			    </div>
			</ul>
			 <?php
          }
         ?>
			
		</div>
		<!--底部-->
		<footer class="row footer">
			<!--<div "></div>-->
			<ol class="ff" style="overflow: hidden;">
				<li class="totle_money text-center">商品总金额：<span style="color: red;">¥<?php echo $_SESSION["cartPrice"]?></span></li>
				<li class=" foot text-center" style="background: #EFEFEF;border: 1px solid #DDDDDD;border-radius:4px;width: 40%;">
					<a href="../index.php">
						<div ><span>继续购物</span></div>

					</a>
				</li>
				<li class="foot text-center" style="background: #D00878;width: 55%;border-radius: 3px;margin-left: 3%;">
					<a  href="orderCat.php">
						<?php if(!empty($cartList)) {?>
							<div style="color: #fff;"><span style="color: #fff;">去结算</span></div>
						<?php }?>
					</a>
				</li>
				<!--<li class=" foot text-center">
					
				</li>-->
				
				
			</ol>
		</footer>
		
		
	</body>
	<script src="../js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
		 $(function(){
        	
        	var num = $("#numm").val();
//      	console.log(num);
            $("#btn2").click(function(){
//          	alert(num);
              	num++;
              	$("#numm").val(num);
            })
            $("#btn1").click(function(){
              	num--;
              	if(num<=0){
              		num=0;
              	}
              	 $("#numm").val(num);
            })
              //确定数量提交
//          $("#delBtn").click(function(){
//          	alert(" 确定要删除？");
//        })
            //删除商品  
           
        

        })
        function del(id)
        {
        	
            $.ajax({
                url:"ajaxDelcart.php",
                type:"POST",
                data:"id="+id,
                success:function(data){
                	data = eval(data);
                     alert(data);
                    if(data=="1")
                        {
                            location.href="cart.php";
                        } 
                },
                error:function(){
                    alert("错误");
                }
            })
        }
		$(".icon-back").click(function(){
				history.go(-1);
				
			})
	</script>
</html>
