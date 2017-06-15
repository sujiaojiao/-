<?php
   	require "../public/init.php";
	$id=$_POST["id"];
	 
	$cart = new cart();
	
	if($cart->delCart($id))
	{
	    echo 1;
	}else
	{
	    echo 0;
	}
?>