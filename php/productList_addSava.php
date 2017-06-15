<!--商品管理/添加商品的数据库处理-->
<?php
   require_once "islogin.php";
   require_once "../plus/DbMysql.php";
   
  	$tid=$_POST["tid"];
	$idpath=$_POST["tid"];
	$typename=$_POST["typename"];
	$picurl=$_POST["picurl"];
	$sd=1; //默认深度是1
	$db = new DbMysql();
	if($tid!=0)
	{
	    
	    $result=$db->select("select * from productList where id=$tid", 1);
	    $sd=$result["sd"]+1;
		$idpath = $result["idpath"]."_".$result["id"];
	   // echo "表示不是一级分类，需要获得上级分类的深度+1";
	   
	}
// echo $idpath;
// echo "<br>";
// echo $tid;
// exit;
  
   
   $isok=$db->sql("insert into productList(tid,typename,sd,idpath,picurl) values('$tid','$typename','$sd','$idpath','$picurl')");

	if($isok==1)
	{
	    echo "<script>alert('商品分类创建成功');location.href='productList.php';</script>";
	}
	else
	{
	    echo "<script>alert('商品分类创建失败');location.href='productList.php';</script>";
	}
?>