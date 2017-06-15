<?php
	require "public/init.php";
$sql="select title,id,price,yprice,picurl from product";
$parm=" where 1";


if(@$k!="")
{
    $parm.=" and title like '%$k%' ";
    $sk=$k;
}



//品牌判断

$pp=@$_GET["ppid"];

if($pp!="")
{
   $parm.=" and ppid='$pp' ";
}

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
//echo $sql;
	
	?>

<!DOCTYPE html>
<html>
	<head>
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="css/iconfont.css"/>
		<title>搜索</title>
		<style>
			*{margin: 0;padding: 0;}
			#userPassword 	header{width: 100%;height: 50px;background: deeppink;line-height: 50px;color: #fff;font-size: 20px; box-sizing: border-box;padding-left: 20px;}					
		</style>
	</head>
	<body id="userPassword" style="background: #f3f4f5;">
		<header> <span class="iconfont icon-back"></span></header>
		<style>
			.content .problem{display:inline-block;width: 100%;height: 30px;padding: 6px;}
		    .content{box-sizing: border-box;padding: 0 10px 0px 10px;background: #EFEFEF;}
		   .content .row{margin: 10px 0;}
		    .search_box{background: #fff;height: 30px;line-height: 30px;border-radius: 5px;}
		  .Bt{width:60px;font-size: 1rem;height: 30px;border-radius: 8px;margin-left: 5px;background: #D00878;color: #fff;}
		  .content2{box-sizing: border-box;padding: 0 4px 0px 4px;}
		   .content2 .row{padding:6px 0px;margin: 0;}
		   .content2 .num{margin-top: 4px;padding: 2px 2px 1px 2px;border: 0;height: 270px;}
		   .content2 .thumbnail img{width: 100%;height: 210px;}
		   .content2 .num a{color: #666666;padding: 0;text-decoration: none;}
		   .content2 .num .p_text{height: 60px;}
		   .content2 .num #np{font-size: 1.2rem;color: red;box-sizing:border-box;padding: 10px 8px 0px 10px;}
		   .content2 .num #yp{text-decoration: line-through;font-size: 1rem;}
		   .content2 .num h6{box-sizing:border-box;padding: 0 0 0 10px;margin-top: 2px;color: #666;}
		</style>
		<div class="content container" >			
			<div class="row">
				<form  class="header-search-form">
					<!--action="goodslist/"-->
					<!--<span class="iconfont icon-back" style="float: left;"></span>-->
					<div class="search_box col-xs-9">
						<span class="iconfont icon-sousuo"></span>
						<input type="text" autocomplete="off"  value="<?php echo $sk;?>" name="k" id="input_goods_search_keyword" placeholder="连衣裙" />
						
					</div>
					<button class="col-xs-3 Bt" type="submit" >搜索</button>
					</form>
					
			</div>
			
              <strong>热门搜索词：</strong><a  href=''>连衣裙</a> <a href=''>踏春运动</a>
              
			<span class="numSe" style="margin-left: 4%;color: #999999;" >找到<?php echo $infocount;?>个相关商品</span></div>
		</div>
	    <div class="content2" >			
			<ol class="row searchNew">
				   <?php
						if($result){
							 foreach($result as $rows)
							 {
							 	$rest = substr($rows['picurl'], 3);	
							 	?>
							<li class="col-xs-6 col-md-3 num">
							    <a href="goodslist/show.php?id=<?php echo $rows["id"];?>" class="thumbnail">
							      <img src="<?php echo $rest;?>" alt="...">
							       <div class="p_text">
							       	 <span id="np"><strong>¥<?php echo $rows["yprice"];?></strong></span>
								      <span id="yp" style=""><?php echo $rows["price"];?></span>
								      <h6><?php echo $rows["title"];?></h6>
							       </div>
							      
							    </a>
							</li>
							<?php
					
								}}else{
							     echo "暂无数据";
							 	}
					?>
				
				</ol>
				
			
		</div> 
	
	</body>
	<script src="js/jquery-3.0.0.js"></script>
	<script type="text/javascript">
		var a = $("#input_goods_search_keyword").val();
        if(a==''){
       	  $(".searchNew").hide();
       	  $(".numSe").hide();
        }else{
       	  $(".searchNew").show();
       	  $(".numSe").show();
       }
       	$("#userPassword header span").click(function(){
			history.go(-2);
				
		})
	</script>
</html>

