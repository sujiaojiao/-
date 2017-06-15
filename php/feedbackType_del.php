<!--留言管理/留言删除操作-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	$db = new DbMysql();
	$id=$_GET["id"];
	
	 $sql="delete from feedbackType where id=$id";
	 $isok=$db->sql($sql);
	 
	 if($db->affected()==1){	 
	     echo "<script>alert('留言分类删除成功');location.href='feedbackType.php'</script>";    
	 }else{
	     echo "<script>alert('留言分类删除失败');location.href='feedbackType.php';</script>";
	 }
?>