<?php
  	require '../public/init.php';


	$title="修改资料";
	$info="修改资料成功";
	$url="user_Edit.php";
	
	$xingming=$_POST["xingming"];
	$sex=$_POST["sex"];
	$mobile=$_POST["mobile"];
	$email=$_POST["email"];
	
	$sql="update user set xingming='$xingming',email='$email',sex='$sex',mobile='$mobile' where username='".UID."'";
	$isok=$db->sql($sql);
	echo $isok;
//	if($isok){
//	    $info="修改成功";
//	}else{
//	    $info="修改失败";
//	}
//	include "user_SavaOk.php";
?>