<!--商品管理/批量删除-->
<?php
  require_once "islogin.php";
  require_once "../plus/DbMysql.php";
  
  $id = @$_POST["id"];
//echo $id;
  
  $idcount = count($id);
  if($idcount == 0){
  	echo "<script>alert('请选择要删除信息');location.href='ProductMng.php';</script>";
    exit();
  }
  
  $del = new DbMysql();

  foreach($id as $v){
  	//错误得信息
  	$del->sql("select * from product where id=$v");
	$isok=$del->affected();
	if($isok != 1){
		echo "<script>alert('错误参数');location.href='ProductMng.php';</script>";
		exit();
	}
  	$sql = "delete from product where id=".$v;
	$del->sql($sql);
  }
  
  echo "<script>alert('批量删除操作成功');location.href='ProductMng.php';</script>";
  
?>