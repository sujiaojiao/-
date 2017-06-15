 <!--创建管理员用户保存-->
 <?php
    require_once "islogin.php";
	require_once "../plus/DbMysql.php";	
 	
 	$username = $_POST["username"];
	$password = $_POST["password"];
	$rights = $_POST["rights"];
	
//	echo $username,$password,$rights;
//	echo "<br>";
 	$admin = new  DbMysql();
	
	//判断数据库里面是否已经有了用户名
	$admin->sql("select * from admin where username='$username'");
	$count = $admin->affected();
	
	if($count>0){
		echo "<script>alert('你建立的账号 $username,已经存在，请重新输入');location.href='admin.php';</script>";
		exit;
	}
	
	$admin->sql("insert into admin(username,password,rights) values('$username','$password','$rights')");
	$isok = $admin->affected();
	if($isok == 1){
		echo "<script>alert('管理员创建成功');location.href='admin.php';</script>";
	}else{
		echo "<script>alert('管理员创建失败');location.href='admin.php';</script>";;
	}
 	?>