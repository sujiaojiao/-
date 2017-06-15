<?php
	require_once "../public/init.php";
	$id = $_GET["id"];
	$sql="select * from product inner join productList on product.typeid=productList.id where product.id='$id'";
	
	$productInfo=$db->select($sql,1);
	if(empty($productInfo)){
	
	    weberror();
	} 
	
	$tid=$productInfo["tid"]; //分类id
	if($tid!=0){	
	    //echo $listInfo["idpath"];
	    $tids=explode("_", $productInfo["idpath"]);
	    $tid=$tids[1];
	}else{	
	    $tid=$id;
	}
	
	//位置
    $weizhi=$action->getWeizhi($productInfo["idpath"]."_".$productInfo["typeid"]);
	
	preg_match_all("/(.*?)@(.+?)#/is", $productInfo["picurls"], $arr,PREG_SET_ORDER);
	?>
<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			 <link href="../css/font-awesome.css" rel="stylesheet">
		    <link href="../css/animate.css" rel="stylesheet">
		    <link href="../css/style.css" rel="stylesheet">
			<link  rel="stylesheet" href="../css/swiper.min.css" />
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title><?php echo $productInfo["title"]."-".$productInfo["typename"];?></title>
		<style>
			*{margin: 0;padding: 0;}						
			.content_pp{padding: 5px 15px;margin: 0;background: #f3f4f5;}
			
		    .content_pp .xp{font-size: 1.8rem;color: #D00878;}
			.content_pp .yp{text-decoration: line-through;margin-left: 15px;color: #AAAAAA;}
			.content_pp .kuc{margin-left: 30px;}
			.content_pp h6{font-size: 1.5rem}
		    .content_pp .liu{color: #AAAAAA;}
			
			
			
			.bac{font-size: 4rem;width:36px;height:36px;border-radius: 50%;background:#f3f4f5; position: fixed;z-index: 205;top:5px;left: 5px;line-height: 36px;text-align: center;}
	        .bac .iconfont{vertical-align: top;display: inline-block;color: #999999;line-height: 36px;}
		   .content{width: 100%;height: 351px;border-bottom: 1px solid #DDDDDD;background: #f3f4f5;}
		    .swiper-wrapper{height:350px;position: relative;margin: 0;padding: 0;}
		    .shti{display: none;width: 150px;height: 50px;background: rgba(0,0,0,0.6);position: absolute;bottom: 50px;margin:auto ;left: 0;right: 0;color: #D00878;border-radius: 6px;}
		  
		  
		  .footer{width:100%;margin:0 auto;background:#f1eeee;position: fixed;bottom: 0; }
            .ff .foot{height: 52px;float: left;line-height: 52px;}
            .ff .foot .iconfont{font-size: 2.5rem;}	
            .ff .foot a{color: #333333;text-decoration: none;}
            .ff .foot span{font-size: 1.6rem;color: #333333;}
		
		
		
		</style>
	</head>
	<body id="userPassword" style="background:#DDDDDD ;">
		    <div class="bac"><span class="iconfont icon-back"></span></div>
		
		<div class="content">		
			<div class="swiper-container">
       
		        <div class="swiper-wrapper">
		        	
		        	<?php
		        		 foreach($arr as $k=>$v){
                          echo "<img  src=\"{$arr[$k][2]}\"  class=\"swiper-slide\" data-history=\"2\">";  
                        }
						
		        	?>
		            <!--<img src="" class="swiper-slide" data-history="1" ></img>
		            <img src="../img/ceimg/qun.jpg" class="swiper-slide" data-history="2" ></img>
		            <img src="../img/ceimg/qun.jpg" class="swiper-slide" data-history="3"></img>-->
		           
		        </div>
		        <div class="swiper-pagination"></div>
		    </div>
		</div>
		<div class="row content_pp">
			<span class="xp"><strong>¥<?php echo $productInfo["price"];?></strong></span>
			<span class="yp">¥<?php echo $productInfo["yprice"];?></span>
			<span class="kuc">库存：<em><?php echo $productInfo["kucun"];?></em></span>
			<h6><?php echo $productInfo["title"];?></h6>
			<p class="liu">浏览：<?php echo $productInfo["hits"];?>次</p>
			<p>评分：<img src="../images/icon_star_5.gif"></p>
		</div>
		<div class="kong" style="background: #DDDDDD;width: 100%;height: 10px;"></div>
		<div class="row content_pp">
		     <div class="col-lg-6" style="margin-top: 10px;">
	            <div class="tabs-container">
	                <ul class="nav nav-tabs">
	                    <li class="active"><a data-toggle="tab" href="#tab-1">商品信息</a></li>
	                    <li class=""><a data-toggle="tab" href="#tab-2">商品参数 </a></li> 
	                    <!--<li class=""><a data-toggle="tab" href="#tab-3">售前咨询 </a></li>-->
	                            	
	                </ul>
	                <div class="tab-content">
	                    <div id="tab-1" class="tab-pane active">
	                         <div class="panel-body">
	                            <strong>产品介绍</strong>
	                            <?php echo $productInfo["content"];?>
	                         </div>
	                    </div>
	                    <div id="tab-2" class="tab-pane">
	                        <div class="panel-body">
	                            <strong>产品介绍</strong>
	
	                            <p> the buzz o </p>
	
	                            <p>lents. I shouat the present moment; and yet.</p>
	                        </div>
	                    </div>
	                    
	                </div>
	
	
	            </div>
	        </div>
         </div>    
          <div class="" style="height:66px ;"></div>      
        <!--底部-->
		<footer class="row footer">
			<ol class="ff">
				<li class=" foot text-center" style="background: #EFEFEF;border: 1px solid #DDDDDD;border-radius:4px;width: 40%;">
					<a  class="favorite">
						<div class="iconfont icon-shoucang"><span>加入收藏</span></div>
                        <div class="shti" >收藏成功！</div>
					</a>
				</li>
				<li class="foot text-center" style="background: #D00878;width: 55%;border-radius: 3px;margin-left: 3%;">
					<a  href="#number_form1">
						<div class="iconfont nowbuy icon-gouwuche1" style="color: #fff;"><span  style="color: #fff;">立即购买</span></div>
					</a>
				</li>
				
			</ol>
		</footer>
		<style>
			.number_form{position: fixed;z-index:600;bottom: 0;width:100%;height: 100px;background: #f3f4f5;overflow: hidden;}
			.number_form>p:nth-child(1){float: left;margin-left: 4%;margin-top: 10px;}
			.number_form>p:nth-child(2){float: right;margin-right: 4%;margin-top: 10px;}
		    .number_form p button{width: 40px;line-height: 30px;}
		    .number_form,.meng{display: none;}
		</style>
		<div class="meng" style="width: 100%;height: 100%;background: rgba(0,0,0,0.5);position: fixed;z-index: 400;top: 0;"></div>
		<div class="number_form" id="number_form1">
			<p>购买数量</p>
			<p>
				<button id="btn1" type="button">-</button>
				<input id="numm" type="text" value="0" size="4" style="background:#f3f4f5;text-align: center;"/>
				<button id="btn2" type="button">+</button>
			</p>
			<p style="clear: both;"></p>
			<div class="text-center confirm"  style="width: 100%;height: 36px;line-height: 36px;color: #fff;font-size: 1.6rem;position:absolute;bottom:0;background: #D00878;">确定</div>
		</div>
                
                
	
	</body>
	
	<script src="../js/jquery-3.0.0.js"></script>
	<script src="../js/swiper-3.3.1.min.js"></script>
	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.metisMenu.js"></script>
    <script src="../js/jquery.slimscroll.min.js"></script>

    <script src="../js/inspinia.js"></script>
    <script src="../js/pace.min.js"></script>
	
	<script type="text/javascript">
		
		$(".icon-shoucang").click(function(){
             	$(".shti").show();
             	setTimeout(function(){
             		$(".shti").fadeOut();
             	},1000);
            }) ;
		var swiper = new Swiper('.swiper-container', {
            
            
            spaceBetween: 10,
			initialSlide:0,
            slidesPerView: 1.3,
            centeredSlides: true,
            slideToClickedSlide: true,
            grabCursor: true,
//          scrollbar: '.swiper-scrollbar',
            pagination: '.swiper-pagination',
//          history: 'historyApp.php?page=slide',
            history:'love',

        });
        
        $(function(){
        	$(".nowbuy").click(function(){
        		$(".meng").show();
        		$(".number_form").show();
        		$(".number_form").addClass("animated fadeInUp");
        	})
        	var num = $("#numm").val();
//      	alert(num);
            $("#btn2").click(function(){
              	num++;
//            	alert(num);
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
              
            $(".confirm").click(function(){
            	if($("#numm").val() ==0){
		            alert('请输入要购买的数量');
		        }else{
		        	$(".meng").hide();
        		    $(".number_form").hide();
		        }
		        
		        $.ajax({
		           url:"../ajax/ajaxCart.php",
		           type:"POST",
		           data:"id=<?php echo $id?>&sum="+$('#numm').val()+"",
		           success:function(data){
//		           	alert(data);
		           	dat = eval(data);
		           
		               switch(dat){
		                   case "nologin":
		                       alert('请您登陆');
		                       location.href='../user/user_login.php';
		                       break; 
		                    case 2:
		                        alert('库存不足');
		                        break;
		                    case 1:
		                        location.href='../ajax/cart.php';
		                         break;
		                    default:
		                        alert(dat);
		                       
		               }
		           },
		           error:function(){
		               alert('错误');
		           }
		        });
		        
		        
		        
		        
		        
              	
            })
             
              
            

        })
        $(".icon-back").click(function(){
				history.go(-1);
				
			})
//     
	</script>
</html>

