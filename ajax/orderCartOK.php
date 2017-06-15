<?php
    require "../public/init.php";
	if(!ISLOGIN)
	{
	    weberror();
	}
	unset($_SESSION["productCart"]);
	$orderID=$_GET["id"];
	//echo $orderID;
	$sql="select * from orderCart where orderID='$orderID'";
	$orderInfo=$db->select($sql,1);
//	var_dump($orderInfo);
	if(empty($orderInfo))
	{
	    weberror();
	}
	
	
	$order = new order;
	
	$orderList = $order->getOrderList($orderID);
?>

<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>下单</title>
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
		<header>						
			<div class="head row" style="position: relative;">	
				<span class="iconfont icon-back"></span>
				<div class=" text-center">订单信息</div>								   
			</div>					
		</header>
		<style>
			.content .problem{width: 100%;padding: 4px;color: red;font-size: 1.8rem}
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
				<p class="problem">
					
				<img style="width: 100%;" src="../img/user/28.png" />
				</p>
				<form method="post" id="form_checkout" action="orderCartOK.php" >
					<!---->
				<li class="panel panel-success">
					<div class="panel-heading">
					   <h3 class="panel-title" style="overflow: hidden;color: red;">
					   	<img style="float: left;width: 12%;" src="../img/index/submitpic_03.png"/>
					   	<div style="float: left;width: 85%;margin-left: 2%;">
					   		 <?php
                        if($orderInfo["payment"]=='货到付款'){
                            echo "恭喜，您的订单已经提交成功，将在确认后发货，请耐心等待！";
                        }else{
                             echo "恭喜，您的订单已经成功，请尽快完成支付";
                        }
                        ?>
					   	</div>
					   	
					   </h3>
					</div>
				    <div class="panel-body">			    
					    <div class="shdizhi" >
					    	
					    	<p><span style="color: #999999;margin-right: 2%;">* 订  单  号 :</span> <span style=""><?php echo $orderID;?></span> </p>
					    	<p><span style="color: #999999;margin-right: 2%;">* 应付金额:</span><span><?php echo $orderInfo["price"]?></span></p>
					    	<p><span style="color: #999999;margin-right: 2%;">* 配送方式:</span><span>城市配送</span></p>
					    	<p><span style="color: #999999;margin-right: 2%;">* 订单商品:</span><span><?php
	                        foreach($orderList as $rows)
	                        {
	                            echo "<img src='".str_replace("","",$rows["picurl"])."' height='40' width='40' /> ";
	                        }
	                        ?></span></p>
					    </div>
					    <div class="text-center backIN" style="width: 90px;height: 30px;margin: auto;line-height: 30px;color: #FFF;background: #D00878;border-radius: 8px;margin-top: 12px;">返回首页</div>
					   <div class="" style="padding-top: 6px;">
					   	  <?php
                           if($orderInfo["payment"]=='货到付款'){
                            ?>
					    	<p style="color: red;">温馨提示</p>
					    	<div>* 请在收到货时将货款交付给配送员</div>
					    	<div style="margin-top: 5px;">* 付款前请先验货，若配送员不允许验货可联系客服处理。</div>
					    	<?php
                        }
                        ?>	
					    	
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
            	alert(data);
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
	$(".backIN").click(function(){
		window.location.href='../index.php';
					
	})
	</script>
</html>
