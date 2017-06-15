<?php
	require_once "islogin.php";
	require_once "../plus/DbMysql.php";
	
	$id = $_GET["id"];
//	echo $id;
    $logDel = new DbMysql();
	$logDel->sql("delete from adminLog where id=$id");
	$result=$logDel->affected();
		
//	echo $result;
	if($result==1){
		echo "<script>alert('删除成功');location.href='log.php';</script>";
	}else{
		echo "<script>alert('删除失败');location.href='log.php';</script>";
	}
	
	?>