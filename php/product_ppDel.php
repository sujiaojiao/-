<!--商品管理/商品删除-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	
	$id=$_GET["id"];
		
	$db = new DbMysql();
	$sql="delete from productpp where id='$id'";	
	$isok=$db->sql($sql);	
	if($isok==1){	
	    echo "<script>alert('删除成功');location.href='product_pp.php'</script>";
	}else{		
	    echo "<script>alert('删除失败');location.href='product_pp.php';</script>";
	}
?>