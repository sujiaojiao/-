<?php
  require_once "islogin.php";
  require_once "../plus/DbMysql.php";
  
  $id = $_GET["id"];
  
  $db = new DbMysql();
  
  $sql = "delete from receive where id='$id'";
  $db->sql($sql);
  if($db->affected()){
  	echo "<script>alert('删除会员收货地址成功');location.href='receive.php';</script>";
  	exit;
  }else{
  	echo "<script>alert('删除会员收货地址失败');location.href='receive.php';</script>";
  	exit;
  }
?>