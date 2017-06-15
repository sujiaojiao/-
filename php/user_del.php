<!--用户删除操作-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	
	$id=$_GET["id"];
//	echo $id;
	$del = new DbMysql();
	
	$isok = $del->sql("delete from user where id='$id'");
	
	if($isok==1){	
	    echo "<script>alert('删除会员成功');location.href='user.php';</script>";
	}else{		
	    echo "<script>alert('删除会员失败');location.href='user.php';</script>";
	}

?>