<?php
session_start();
  
	$sk="";
	$k=@$_GET["k"];
	define("WEBDTR", dirname(dirname(__FILE__)));
	$uid="";
	$pwd="";
	$islogin=false;
	if(isset($_SESSION["webusername"])){
	    $islogin=true;
	    $uid=$_SESSION["webusername"];
	    $pwd=$_SESSION["webpassword"];
	}
	define("ISLOGIN",$islogin);
	define("UID",$uid);
	define("PWD",$pwd);
//	echo UID;
  require_once WEBDTR."/config/config.php";
  require_once WEBDTR."/public/functions.php";
  function __autoload($classname){
  	if($classname=="DbMysql"){
  		$file = WEBDTR."/plus/".$classname.".php";
  	}else{
  		$file = WEBDTR."/plus/".$classname.".class.php";
  	}
  	
	include_once $file;
  }
  
  $db = new DbMysql();
   $action = new action();
  
?>