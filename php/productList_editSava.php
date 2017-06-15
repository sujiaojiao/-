<!--商品管理/商品修改数据库操作-->
<?php
	require_once "islogin.php";
	require_once "../plus/DbMysql.php";
	require_once '../plus/ProductType.class.php';
	$editsava = new DbMysql();
	$id=$_GET["id"];

	
	
	$tid=$_POST["tid"];
    $idpath=$_POST["idpath"];
	$typename=$_POST["typename"];
	$picurl=$_POST["picurl"];
	
	$sd=1;
	

	
     $newpath;
//	$ptype = new ProductType();
//	$ptype->updateSd($id, $sd);
    
	if($tid!=0){
     	$result=$editsava->select("select * from productList where id=$tid", 1);
    	$sd=$result["sd"]+1;
		$newpath = $result["idpath"]."_".$result["id"];
   // echo "表示不是一级分类，需要获得上级分类的深度+1"; 
	}
	
	$xj=$idpath."_".$id;//下级id
//	echo $tid;
	
	@$sql = "update productList set idpath=replace(idpath,'$idpath','$newpath') where (idpath like='$idpath%' and id='$id') or(idpath like '$xj%')";
//	echo $sql;
	$editsava->sql($sql);
//	exit;

	$isok=$editsava->sql("update productList set tid='$tid',typename='$typename',sd='$sd',picurl='$picurl' where id=$id");

	if($isok==1){	
	    echo "<script>alert('修改成功');location.href='productList.php'</script>";
	}
	else{	
	    echo "<script>alert('修改失败');location.href='productList.php'</script>";
	}
?>