<!--商品品牌的处理页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	
	$ppname=$_POST["ppname"];
	$pporder=$_POST["pporder"];
	$recommend=$_POST["recommend"];
	$picurl=$_POST["picurl"];
	$ppinfo=$_POST["ppinfo"];
	
	$db= new DbMysql();
	
	$db->sql("select * from productpp where ppname='$ppname'");
	if($db->affected()>0)
	{
	    echo "<script>alert('品牌名称已经存在,请检查后重新添加');location.href='product_pp.php'</script>";
	    exit;
	}
	$sql="insert into productpp(ppname,pporder,recommend,picurl,ppinfo)
	values('$ppname','$pporder','$recommend','$picurl','$ppinfo')    
	";
	$isok=$db->sql($sql);
	
	if($isok==1)
	{
	    echo "<script>alert('商品品牌创建成功');location.href='product_pp.php'</script>";
	}
	else
	{
	    echo "<script>alert('商品品牌创建失败');location.href='product_pp.php'</script>";
	}


?>