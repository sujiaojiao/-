<meta charset="utf-8" />
<?php
	require_once '../public/init.php';
	
	$userinfo  = new UserInfo();
	$zt=$userinfo->isok();

	$ymima=md5($_POST["yPassword"]);
	$xmima=md5($_POST["xPassword"]);
	$qmima=md5($_POST["qPassword"]);
	
	$sql="select * from user where username ='".UID."' and password='$ymima'";
	$db->sql($sql);

	 
	if($db->affected()!=1){
	    webAlter("原密码错误", 'user_Password.php');
	}
	
	if($xmima!=$qmima){
	    webAlter("两次密码不一致", 'user_Password.php');
	}
//	
	$sql="update user set password='$xmima' where username ='".UID."'";
	$isok=$db->sql($sql);
//	
	if($isok)
	    {
	    session_destroy();
	    $_SESSION=array();
	        webAlter("您的密码修改成功,请重新登陆！", '../login.html');
	    }else{
	       webAlter("修改失败", 'user_Password.php'); 
	    }
    
    
    
?>