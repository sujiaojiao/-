
<?php
	require "../public/init.php";
	$id=$_GET["id"];
//	echo $id;
	$sql="select * from productList where id='$id'";
	$listInfo=$db->select($sql,1);
	if(empty($listInfo))
	{
	    weberror();
	}
	
	$menu=$listInfo["idpath"]."_".$id;
	$weizhi=$action->getWeizhi($listInfo["idpath"]."_".$id);
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
	    $tid=$id;
	}
	 

	$sql="select title,id,price,yprice,picurl from product";
	$parm=" where 1";
	$parm.=" and (typeid='$id' or typeid in($xjids))"; 
	
	
	
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
		 
		 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<link rel="stylesheet" type="text/css" href="../css/reset.css" />
			<meta charset="UTF-8">
			
			<link rel="stylesheet" href="../css/bootstrap.min.css" />
			<link  rel="stylesheet" type="text/css" href="../css/iconfont.css"/>
		<title>分类</title>
		<style>
			*{margin: 0;padding: 0;}						
			#userPassword header{height: 50px; width: 100%;background: #DDDDDD;position: relative;}
			#userPassword .colorAcyive{color: #14d392;}
			#userPassword header p{width: 100%;line-height: 50px;text-align: center;font-size: 2.1rem;color: #333333;font-weight: 600;}
		    #userPassword header .iconfont{color: #333333;font-size: 1.7rem;position: absolute;left: 15px;height: 50px;line-height: 50px;}
	
		</style>
	</head>
	<body id="userPassword" style="background: #f3f4f5;">
		<header>
			<span class="iconfont icon-back"></span>
			<p ><?php echo $listInfo["typename"];?></p>
		</header>
		
		<style>
			.top_text{width: 100%;height: 34px;line-height:34px ;background: pink;color: #666666;font-size: 0.8rem}
		   .top_text > span:nth-child(1),
		   .top_text > span:nth-child(2),
		   .top_text > span:nth-child(3){ margin-right: 20px;}
		   .top_text a{text-decoration: none;}
		   
		   .content{box-sizing: border-box;padding: 0 4px 0px 4px;}
		   .content .row{padding:6px 0px;margin: 0;}
		   .content .num{margin-top: 4px;padding: 2px 2px 1px 2px;border: 0;height: 270px;}
		   .content .thumbnail img{width: 100%;height: 210px;}
		   .content .num a{color: #666666;padding: 0;text-decoration: none;}
		   .content .num .p_text{height: 60px;}
		   .content .num #np{font-size: 1.2rem;color: red;box-sizing:border-box;padding: 10px 8px 0px 10px;}
		   .content .num #yp{text-decoration: line-through;font-size: 1rem;}
		   .content .num h6{box-sizing:border-box;padding: 0 0 0 10px;margin-top: 2px;}
		   
		</style>
		<div class="top_text text-center">
			

			<!--<span class="iconfont icon-quanbu ">全部</span>
			<span class="iconfont icon-bendirexiao">热销</span>
			<span class="iconfont icon-recommend">推荐</span>
			<span class="iconfont icon-jiangjia">降价</span>-->
            <a href="<?php echo $page->pageurl2('attr');?>0" class="show-mode-but <?php if($attr==0) echo "cur";?>">全部:</a>
			<a href="<?php echo $page->pageurl2('attr');?>1" class="show-mode-but <?php if($attr==1) echo "cur";?>">热销 </a>
			<a href="<?php echo $page->pageurl2('attr');?>3" class="show-mode-but <?php if($attr==3) echo "cur";?>">降价 </a>
			<a href="<?php echo $page->pageurl2('attr');?>2" class="show-mode-but <?php if($attr==2) echo "cur";?><?php if($order==4) echo "up"?>">推荐 </a>
		</div>
		
		
		<div class="content" >			
			<ol class="row">
				
					 
							 <?php
							 	if($result){
							 foreach($result as $rows)
							 {
							 	?>
							<li class="col-xs-6 col-md-3 num">
							    <a href="show.php?id=<?php echo $rows["id"];?>" class="thumbnail">
							      <img src="<?php echo $rows["picurl"];?>" alt="...">
							       <div class="p_text">
							       	 <span id="np"><strong>¥<?php echo $rows["price"];?></strong></span>
								      <span id="yp" style=""><?php echo $rows["yprice"];?></span>
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
	<script src="../js/jquery-3.0.0.js"></script>
	<script src="../js/global.js"></script>
	<script type="text/javascript">
		$(".icon-back").click(function(){
				history.go(-1);
				
			})
	</script>
</html>

