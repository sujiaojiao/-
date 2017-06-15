<!--管理员删除操作-->
<?php
	require_once "islogin.php";
	require_once "../plus/DbMysql.php";
	
	$id = $_GET["id"];
	
	$del = new DbMysql();
	$del->sql("delete from admin where id=$id");
	$isok = $del->affected();
	if($isok == 1){
		echo "<script>alert('管理员删除成功');location.href='admin.php';</script>";
	}else{
		echo "<script>alert('管理员删除失败');location.href='admin.php';</script>";
	}
//	echo $id;
	
	?>