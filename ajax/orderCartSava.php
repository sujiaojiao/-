<?php
  
	require "../public/init.php";
	
	$info=array_map("guolvStr", $_POST);
	 
//	$info=array_map("utf",$info);
//	
//	function utf($str)
//	{
//	    return iconv("utf-8","gb2312", $str);
//	}
//	 
//	var_dump($info);
//	
	$ip=getIP();
	$addtime=time();
	
//	 var_dump($info);
//	 exit;
	foreach($_SESSION["productCart"] as $k=>$v){
	    $sql="insert into orderList(orderid,pid,title,unitPrice,Price,total,picurl) 
	        values('{$info["orderid"]}','$k','{$v["title"]}','{$v["unitPrice"]}','{$v["Price"]}','{$v["total"]}','{$v["picurl"]}')";
	
	      $db->sql($sql);
	};
	
	 
	$sql="insert into orderCart(orderID,price,shren,shdizhi,youbian,mobile,payment,dTime,feedback,ip,addtime,username)
	    values('{$info["orderid"]}','{$info["price"]}','{$info["shren"]}','{$info["shdizhi"]}','{$info["youbian"]}','{$info["mobile"]}','{$info["delivery_id"]}','{$info["delivery_time"]}','{$info["message"]}','$ip','$addtime','".UID."')";
	
//	
	if($db->sql($sql)){
	    echo 1;
	}else{
	    echo 0;
	}
?>