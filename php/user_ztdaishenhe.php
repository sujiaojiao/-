<?php

	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	
	$id=@$_POST["id"];
	$db = new DbMysql();	
	if(count($id)==0){	
	    echo "<script>alert('请选择要修改的信息');location.href='user.php'</script>";
	    exit();
	}	
	foreach($id as $v){	
	    $sql="update user set zt=1 where id=$v";
	    $isok=$db->sql($sql);
	    if($isok!=1) {	   
	        echo "<script>alert('发生错误');location.href='user.php'</script>";
	    }	
	}		
	echo "<script>alert('批量修改信息完成');location.href='user.php';</script>";

?>