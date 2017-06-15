<?php
	require '../public/init.php';
	$userinfo  = new UserInfo();
	$zt=$userinfo->isok();

	$order = new order();
	
	$sql="select * from orderCart  where username='".UID."'";
	$result=$db->select($sql);
	$infocount=$db->affected();
 
?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>我的订单-<?php echo $webtitle;?></title>
		<style>
			html{background: #f3f4f5;}							
			.head{margin: 0;width: 100%;height: 50px;line-height: 50px;background: url(../img/login/top_bgline.png) repeat-x;font-family:"微软雅黑";color:#FFFFFF;}			
			.content{background: #f3f4f5; }
			.content .problem{width: 100%;height: 30px;padding: 6px;color: red;font-size: 1.8rem}
		    .content{box-sizing: border-box;padding: 0 10px 0px 10px;}
		    .content .row{margin: 0;}
		    .content ul li .perlist{width:100%;height: 30px;line-height: 30px;border-radius: 10px;}
		    .content ul li.dizhi{font-family:"微软雅黑";}
		    .content .shdizhi{border-bottom: 1px solid #DDDDDD;padding:10px 0 10px 0;}
	        .content .shdizhi .rong{color: #666;margin-left: 2%;}
		</style>
	</head>
	<body>
		<header>						
			<div class="head row" style="position: relative;">	
				<div class=" text-center">我的订单</div>								   
			</div>					
		</header>
		
		<div class="content container" >
			<ul class="row">				
				<form method="post" id="form_checkout" action="orderCartOK.php" >
				<li class="panel panel-success" style="margin-top: 10px;">
					
				    <div class="panel-body" >
				    	<?php
						  if($result){
						  foreach($result as $rows)
						  {
						  ?>  			    
					    <div class="shdizhi" >

					    	<p>
					    		<span>* 订  单  号 :</span>
					    		<span class="rong"><?php echo $rows["orderID"]?></span></p>
					    	<p>
					    		<span>* 订单商品:</span>
					    		<span class="rong"><?php
							    $infos=$order->getOrderList($rows["orderID"]);
								
							    foreach($infos as $rowsd)
							    {
							    	
							        echo "<a href='../goodslist/show.php?id={$rowsd["pid"]}'><img src='{$rowsd["picurl"]}' height='60' width='60'/></a>";
							    }
							  ?></span>
					    	</p>
					    	<p>
					    		<span>* 收  货  人&nbsp;:</span>
					    		<span class="rong"><?php echo $rows["shren"]?></span>
					    	</p>
					    	<p>
					    		<span>* 订单金额:</span>
					    		<span class="rong" style="color: red;"><?php echo $rows["price"]?></span>
					    	</p>
					        <p>
					        	<span>* 下单时间:</span>
					        	<span class="rong"><?php echo date("Y-m-d",$rows["addtime"])?> <?php echo date("H:i:s",$rows["addtime"])?></span>
					        </p>
					    	<p>
					    		<span>* 支付状态:</span>
					    		<span class="rong"> 
					    			 <?php
                                        if($rows["payment"]=='货到付款'){
                                            echo "货到付款";
                                        }else{
                                            echo $order->getPaymentState($rows["paymentState"]);
                                        }
                                    ?>
                                </span>
					    	</p>
					    	<p>
					    		<span>* 订单状态:</span>
					    		<span class="rong"><?php echo $order->getOrderState($rows["orderState"]);?></span>
					    	</p>
					    	<!--<p>
					    		<span>* 操 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作:</span>
					    		<span class="rong"><a target="_blank" href="user_orderInfo.php?id=<?php echo $rows["id"];?>">订单详情</a></span>
					    	</p>-->
					    </div>
                          <?php
 							 }}else{
                             ?>
                          <div class="shdizhi" style="padding-top: 6px;">
					    	<h4 class="dizhi text-center"><em>暂无订单</em></h4>					    	
					    	
					       </div>
                      
		          	  <?php
  						}
                         ?>    
					     
					   <div  style="padding-top: 6px;">
					    	<h4 class="dizhi text-right"><strong>共有<?php echo $infocount;?>个订单</strong></h4>					    	
					    	
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
		
	</script>
</html>
