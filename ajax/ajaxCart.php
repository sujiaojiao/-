<?php
   require_once "../public/init.php";
// require_once "../plus/Cart.class.php";
   if(!ISLOGIN){
   	echo "you are not login";
	exit;
   }
   $cart = new cart();
   $id = $_POST["id"];
   $sum = $_POST["sum"];
   $sql = "select * from product where id='$id'";
   $result = $db->select($sql,1);
   if(empty($result)){
   	  echo 0;
	   exit;
   }
   if($sum>$result["kucun"]){
   	 echo 2;
	   exit;
   }
// echo $result["kucun"];
// exit;
   
   if($cart->addCart($id,$sum)){
   	echo 1; 
   }
  
?>