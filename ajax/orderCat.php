<?php
	require "../public/init.php";
	
	
 
?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>下单-<?php echo $webtitle;?></title>
		<style>
			html{background: #f3f4f5;}							
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(../img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;}			
		     .head .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
			
			.content{background: #f3f4f5; }
			
	
			.footer{width:100%;height: 56px;background:#f1eeee;position: fixed;bottom: 0; margin: 0;}
            .ff .foot{width:20%;height: 56px;float: left;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot p{font-size: 1rem;color: #333333;}
		</style>
		<?php
			if(!ISLOGIN)
	{
	    webAlter("请登陆", "../login.html");
	}
	if(empty($_SESSION["productCart"]))
	{
	     webAlter("请选购商品", "../index.php");
	}
	
	$cart = new cart();
	$cartList=$cart->cartInfo();
	$orderID=  time().  rand(100, 999);
			?>
	</head>
	<body>
		<header>						
			<div class="head row" style="position: relative;">	
				<span class="iconfont icon-back"></span>
				<div class=" text-center">订单信息</div>								   
			</div>					
		</header>
		<style>
			.content .problem{width: 100%;height: 30px;padding: 6px;color: red;font-size: 1.8rem}
		    .content{box-sizing: border-box;padding: 0 10px 0px 10px;}
		   .content .row{margin: 0;}
		    .content ul li .perlist{width:100%;height: 30px;line-height: 30px;border-radius: 10px;}
		     .content ul li.dizhi{font-family:"微软雅黑";}
		    .content .shdizhi input{background: #efefef;vertical-align: top;}
		    .content .shdizhi .peijie{color: #D0D0D0;float: right;}
		    .content .shdizhi{border-bottom: 1px solid #DDDDDD;padding-bottom: 10px;}
		    .everybody .per{background: red;}
		    .everybody .timee{background: green;}
		</style>
		<div class="content container" >
			<ul class="row">
				<!--<img style="padding: 10px 0pt 16px 10px;" src="<?php echo $webdir;?>images/message_board01.jpg" alt="常见问题" height="80" width="130">-->
				<p class="problem">填写核对订单信息</p>
				<form method="post" id="form_checkout" action="orderCartOK.php" >
					<!---->
				<li class="panel panel-success">
					<div class="panel-heading">
					   <h3 class="panel-title">
					   	<span class="iconfont icon-login" style="font-size: 1rem;">填写并确认以下信息，然后提交订单</span>
					   	
					   </h3>
					</div>
				    <div class="panel-body">			    
					    <div class="shdizhi" >
					    	<h4 class="dizhi"><em>1.收货地址</em></h4>
					    	<?php
					    		 $sql="select * from receive where username='".UID."'";
					              $receive=$db->select($sql);
					              foreach($receive as $rows)
					              {
					                  echo "<div class='receive' style=\"line-height: 30px;\" shren='{$rows["shren"]}' shdizhi='{$rows["shdizhi"]}' youbian='{$rows["youbian"]}' mobile='{$rows["mobile"]}' ><b>收货人</b>：{$rows["shren"]} 地址：{$rows["shdizhi"]} {$rows["youbian"]} {$rows["mobile"]}</div>";
					              }  
					    		?>
					    	<p><span>*</span>收 货 人 :<input type="hidden" value="<?php echo $orderID;?>" name="orderid"/> <input name="shren" type="text" id="shren" size="12" /></p>
					    	<p><span>*</span>收货地址:<input name="shdizhi" type="text" id="shdizhi" size="28" /></p>
					    	<p><span>*</span>邮政编码:<input  name="youbian" type="text" id="youbian" size="12" /></p>
					    	<p><span>*</span>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机 :<input name="mobile" type="text" value="" class="focusInput focusTxt" id="mobile" size="18" /></p>
					    </div>
					   <div class="shdizhi" style="padding-top: 6px;">
					    	<h4 class="dizhi"><em>2.支付及配送方式</em></h4>					    	
					    	<p>
					    		<label for="delivery_item_7_cod"><input type="radio" name="delivery_id" value="货到付款" id="delivery_item_7_cod"><span >货到付款</span></label>
					    		<span class="peijie">先验货后付款，现金支付</span>
					    	</p>
					    	<p>
					    		<label for="delivery_item_1_online"><input type="radio" name="delivery_id" value="在线支付" id="delivery_item_1_online"><span>在线支付</span></label>
					    		<span class="peijie">可用支付宝网银</span>
					    	</p>
					    	<p>
					    		<label for="delivery_item_1_offline"><input type="radio" name="delivery_id" value="银行汇款" id="delivery_item_1_offline"><span>银行汇款</span></label>
					    		<span class="peijie">支持邮局、建行等银行汇款</span>
					    	</p>
					    </div>
					    <div class="shdizhi" style="padding-top: 6px;">
					    	<h4 class="dizhi"><strong>送货时间</strong></h4>					    	
					    	<p>
					    		<label for="delivery_time2">
					    			<input type="radio" id="delivery_time2" value="工作日、双休日和假日均可送货" name="delivery_time">
					    			<span >工作日、双休日和假期均可送货</span>
					    		</label>
					    	</p>
					    	<p>
					    		<label for="delivery_time1">
					    			<input type="radio" id="delivery_time1" value="只工作日送货（双休日、假日不送）"  name="delivery_time">
					    			<span>只工作日送货（双休日、假日不送）</span>
					    		</label>
					    	</p>
					    	<p>
					    		<label for="delivery_time3">
					    			<input id="delivery_time3" name="delivery_time" value="只双休日、假日送货（工作日不送）"  type="radio">
					    			<span>只双休日、假日送货（工作日不送）</span>
					    		</label>
					    	</p>
					    </div>
					     <div class="shdizhi" style="padding-top: 6px;">
					    	<h4 class="dizhi"><em>3.商品清单 </em><a href="cart.php" style="font-size: 1.5rem;"> 返回购物车，修改订单商品</a></h4>					    	
					    	<div class=" container" >
								<ul class="row">	    
								    <div>
								    	  <?php
                                           foreach($cartList as $k=>$v)
            						  {
                         		    ?>
									<a href="../goodslist/show.php?id=<?php echo $k;?>" alt="" target="_blank">
										<img src="<?php echo str_replace("", "",$v["picurl"])?>" style="width: 20%;height: 80px;float: left;margin-top: 2px;"/>
									   
									</a>
										    	
										<div style="float: left;width:68%;height: 80px;margin-left: 4%;margin-top: 2px;">
										    <p style="margin: 0;">
							
										    	<a href="../goodslist/show.php?id=<?php echo $k;?>" style="color: #222;"><?php echo $v["title"]?></a>
										    </p>
										    <span id="np" >价格：<strong style="color: red;"><?php echo $v["unitPrice"]?></strong></span>
										    <span id="pnum"style="margin-left: 6%;"><strong>sum:<?php echo $v["total"]?></strong></span>	
									       	
										</div>
										 <?php
             							 }
                                    ?>
									</div>    
								</ul>

							</div>
					    </div>
					     <div class="shdizhi" style="padding-top: 6px;">
					    	<h4 class="dizhi"><em>4.结算信息</em></h4>					    	
					    	<p>
					    		<div>商品件数:<?php echo $_SESSION["cartCount"];?>件</div>
					    		<div>商品金额:¥<?php echo $_SESSION["cartPrice"];?></div>
					    		
					    		<div style="color: #D00878;font-size: 1.8rem;">应付总金额:<?php echo $_SESSION["cartPrice"];?>	<input name="price"  value="<?php echo $_SESSION["cartPrice"];?>" type="hidden" /></div>
					    	</p>
					    </div>
					   <div class="shdizhi" style="padding-top: 6px;border: 0;">
					    	<h4 class="dizhi"><strong>订单留言 </strong><span style="font-size: 1.5rem;"> 字数在100以内</span></h4>					    	
					    	<textarea class="focusTxt" name="message" id="message" style="width: 80%;height: 80px;background: #f9f9f9;"></textarea>
					        <p class="text-center" id="id_action_submit">
					        	<input type="button" id="orderOK" value="提交订单" style="display: inline-block;margin-top:10px;width: 100px;height: 46px;line-height: 46px;background:#D00878;border-radius: 5px;color: #fff;">
					        </p>
					        <div id="id_action_waiting" class="text-center">
								<img src="../img/index/loading.gif">	<span>系统处理中，请稍后&hellip;&hellip;</span>
							</div>
					   </div>
				        
				    </div>
								 
				</li>
				</form>

			</ul>
			
			
		
			
			
			
		</div>
		<!--底部-->
		
		
	</body>
	<script src="../js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
		$(function(){
    
        $('.receive').click(function(){
             $('#shren').val($(this).attr('shren'));
             $('#shdizhi').val($(this).attr('shdizhi'));
             $('#youbian').val($(this).attr('youbian'));
             $('#mobile').val($(this).attr('mobile'));
          //   alert(); 
        });
    
     //提交
     $('#id_action_waiting').hide();
     $('#orderOK').click(function(){
         if(!$('#shren').val()){
             alert('请填写收货人！');
             return false;
         }
         if(!$('#shdizhi').val())
             {
                 alert('请填写收货地址');
                 return false;
             }
         if(!$('#youbian').val())
             {
                 alert('请填写邮编');
                 return false;
             } 
         if(!$('#mobile').val())
             {
                 alert('请填写手机');
                 return false;
             }
       
         if($('input[name=delivery_id]:checked').length<1){
             alert('请选择付款方式!');
             return false;
         }
         
         if($('input[name=delivery_time]:checked').length<1){
             alert('请选择送货时间!');
             return false;
         }
         
         $('#id_action_submit').hide();
         $('#id_action_waiting').show();
         
         
        $.ajax({
            url:"orderCartSava.php",
            type:"POST",
            data:$('#form_checkout').serialize(),
            success:function(data){
//          	alert(data);
               data=eval(data);
                if(data==1)
                    {
                        location.href="orderCartOK.php?id=<?php echo $orderID;?>";
                    }
            },
            error:function(){
                alert('错误');
            }
        })
       
       return false;
     });
})
	$(".icon-back").click(function(){
				history.go(-1);
				
			})	
	</script>
</html>
