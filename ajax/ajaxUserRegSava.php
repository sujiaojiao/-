<?php
	require_once "../public/init.php";
	
	
	$username=$_POST["username"];
	//注册时候你可以进一步的判断
	$password=md5($_POST["password"]);
	$code=$_POST["code"];
		
	if($code!=$_SESSION["rand"]){
	    echo "0";
	    exit;
	}
	
	$db=new DbMysql();
//	
	$db->sql("select * from user where username='$username'");
	if($db->affected()!=0){
	    echo "5";
	    exit;
	}
	
	$zt=1;	
	if($webuserreg=='N'){
	  $zt=2;  
	}
//		
	$sql="insert into user(username,password,email,zt) values('$username','$password','$username','$zt')";
	$db->sql($sql);
//		echo $db->affected();
	if($db->affected()=="1"){
	
	    echo $zt;
	}

?>