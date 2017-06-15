<!--商品处理/商品保存数据库-->
<?php
   require_once "islogin.php";
   require_once "../plus/DbMysql.php";
   require_once "../plus/main.class.php";
   
   $maig = new maig();
   $add = new DbMysql();
   
  
   
   $hot = empty($_POST["hot"])?0:$_POST["hot"];
   $drop = empty($_POST["drop"])?0:$_POST["drop"];
   $recommend = empty($_POST["recommend"])?0:$_POST["recommend"];
   


   
   $numbers = $_POST["numbers"];
   $title = $maig->str($_POST["title"]);
   $typeid = $_POST["typeid"];
   $kucun = $_POST["kucun"];
   $hits = $_POST["hits"];
   $picurl = $_POST["picurl"];
   $content = $_POST["content"];
   $ppid = $_POST["ppid"];
   $yprice = $_POST["yprice"];
   $price = $_POST["price"];
   
// echo $picurl;
// exit;
   $time = time();
   $inputer = $_SESSION["username"];
   $picurls = "";
 
   foreach($_SESSION["urlfile_info"] as $row=>$v){
 
	 $picurls .= $_POST["picinfook".$row]."@".$v;
	 $picurls .= "#";
   }
   
//echo $picurls;
//exit;
   
   $isok = $add->sql("insert into product(numbers,title,typeid,ppid,hot,drops,recommend,kucun,hits,picurl,picurls,content,addtime,inputer,yprice,price) values('$numbers','$title','$typeid','$ppid','$hot','$drop','$recommend','$kucun','$hits','$picurl','$picurls','$content','$time','$inputer','$yprice','$price')");
  
   
   if($isok == 1){
   		echo "<script>alert('插入成功');location.href='ProductMng.php';</script>";
   }else{
   	   	echo "<script>alert('插入失败');location.href='ProductMng.php';</script>";
   }

?>