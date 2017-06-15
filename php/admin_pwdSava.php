<!--管理员更新密码时处理页面-->

<?php
	require_once "islogin.php";
	require_once "../plus/DbMysql.php";
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$edit = new DbMysql();
	$edit->sql("update admin set password='$password' where username='$username'");
	
	session_destroy();
	echo "<script>alert('修改成功，请重新登陆');top.location.href='login.php';</script>";
//	echo $username,$password;
	
	?>