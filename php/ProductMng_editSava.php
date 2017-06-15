<!--商品管理/商品修改保存数据库处理-->

<?php
  	require_once "islogin.php";
  	require_once "../plus/DbMysql.php";
	require_once "../plus/main.class.php";
//	require_once "../plus/page.class.php";
//	require_once "../plus/productType.class.php";
	
	$maig = new maig();
	
	$sava = new DbMysql();
	

	
	$id = @$_GET["id"];
	
	$result = $sava->select("select * from product where id=$id",1);
	$picurlArray =array_filter(explode("#", $result["picurls"]));
	$piccount = count($picurlArray);
	
	$newpicurls="";
	foreach($picurlArray as $key=>$v){
		$picinfo = explode("@", $v);
		if(isset($_POST["editimginfo".$key])){    
        $newpicurls.=$_POST["editimginfo".$key]."@";
        $newpicurls.=$picinfo["1"];
        $newpicurls.="#";
    }else{
			
		}		
	}
	$picurls = "";
	foreach($_SESSION["urlfile_info"] as $row=>$v){
		$picurls .= $_POST["picinfook".$row]."@".$v;
		$picurls .= "#";
	}
	
	
	
	$title = $maig->str($_POST["title"]);
	$numbers = $_POST["numbers"];
	$typeid = $_POST["typeid"];
	$hot = empty($_POST["hot"])?0:$_POST["hot"];
	$drops = empty($_POST["drop"])?0:$_POST["drop"];
	$recommend = empty($_POST["recommend"])?0:$_POST["recommend"];
	$kucun = $_POST["kucun"];
	$hits = $_POST["hits"];
	$picurl = $_POST["picurl"];
	$content = $_POST["content"];
    $ppid = $_POST["ppid"];
	$yprice = $_POST["yprice"];
	$price = $_POST["price"];
//	
	$isok = $sava->sql("update product set title='$title',numbers='numbers',typeid='$typeid',ppid='$ppid',hot='$hot',drops='$drops',recommend='$recommend',kucun='$kucun',hits='$hits',picurl='$picurl',content='$content',picurls='$newpicurls$picurls',yprice='$yprice',price='$price' where id=$id ");
	
	if($isok == 1){
		echo "<script>alert('修改成功');location.href='ProductMng.php';</script>";
	}else{
		echo "<script>alert('修改失败');location.href='ProductMng.php';</script>";
	}
?>