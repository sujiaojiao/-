<?php
	require_once 'islogin.php';
	require_once '../Plus/DbMysql.php';
	$db= new DbMysql();
	
	
	$id=$_POST["id"];
	$typename=$_POST["typename"];
	$typeorder=$_POST["typeorder"];
	$typezt=$_POST["typezt"];
	
	
	if($typename==""){	
	    echo "<script>alert('分类名称不能为空');location.href='feedbackType.php'</script>";
	    exit();
	}	
	$result=$db->select("select * from feedbackType where id=$id",1);
	
	if($db->affected()!=1){
	    echo "<script>alert('修改ID不存在,请检查');location.href='feedbackType.php'</script>";
	    exit();	     
	 }
	
	$db->sql("select * from feedbackType where typename='$typename' and not id=$id");
	
	if($db->affected()!=0){	
	    echo "<script>alert('分类名称重复，请检查后再进行操作');location.href='feedbackType.php'</script>";
	    exit(); 
	}
	
	 
	$sql="update feedBackType set
	  typename='$typename',
	  typeorder='$typeorder',
	  typezt='$typezt' where id=$id
	";
		
	$isok=$db->sql($sql);		
	if($isok==1){
	    echo "<script>alert('修改成功');location.href='feedbackType.php'</script>";
	}else{
	    echo "<script>alert('修改失败');location.href='feedbackType.php';</script>";
	}

?>