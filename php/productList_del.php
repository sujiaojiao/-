<?php
   require_once "islogin.php";
   require_once "../plus/DbMysql.php";
   require_once "../plus/ProductType.class.php";
   
   $id = $_GET["id"];
   
   $del = new  ProductType();
   $del->typeDel($id);
   
   echo "<script>alert('删除成功');location.href='productList.php';</script>";
   


   
   
   

?>