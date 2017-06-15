 <meta charset="utf-8" />
<?php

    session_start();
	require_once "../plus/DbMysql.php";
	require_once "../plus/AdminLogin.class.php";
	
	$username=$_POST["username"];
	$password=$_POST["password"];
	$code=$_POST["code"];
	
	//判断输入的session和验证码是否一样
	if($code != $_SESSION["rand"]){
		echo "<script>alert('验证码不正确，请重新登陆');location.href='login.php';</script>";
		exit;
	}
	
	//判断登陆密码用户名
	$login = new AdminLogin();
	$islogin = $login->isLogin($username, $password);
		
	if($islogin == 1){
		
		$_SESSION["username"]=$username;
		$_SESSION["password"]=$password;
		echo "<script>alert('欢迎回来!$username');location.href='index.php';</script>";
	}
	if($islogin == -1){
		echo "<script>alert('密码错误！');location.href='login.php';</script>";
	}
	if($islogin == -2){
		echo "<script>alert('用户名不存在！');location.href='login.php';</script>";
	}
	?>