
<?php
	require "../public/init.php";
	require_once '../plus/DbMysql.php';


	$info=array_map("guolvStr", $_POST);

	$addtime=time();
	$ip=getIP();
	$zt=0;
	if($webMessage=="N")
	{
	    $zt=1;
	}
	$sql="insert into feedback(content,usernameshow,inputer,addtime,qq,mobile,email,wangwang,ip,issh)
	     values('{$info["content"]}','{$info["uname"]}','{$info["uname"]}','$addtime','{$info["qq"]}','{$info["phone"]}','{$info["email"]}','{$info["wangwang"]}','$ip','$zt')";
	
	echo $db->sql($sql);
//	if($db->sql($sql)){
//	    webAlter("留言成功", "../Message.php");
//	}else{
//	   webAlter("留言失败", "../Message.php");
//	}
?>