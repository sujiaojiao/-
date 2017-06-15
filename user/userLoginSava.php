
<?php
session_start();

    require_once "../plus/DbMysql.php";
	require_once "../plus/UserInfo.class.php";
	
	if(empty($_POST)){
		echo "";
		exit;
	}
    $userinfo = new UserInfo();
	$username = $_POST["login_username"];	
	$password =  $_POST["login_password"];
	$code = $_POST["login_code"];
//	echo $username;
	echo $userinfo->islogin($username, $password,$code);
	
?>