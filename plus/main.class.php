<!--输入信息的过滤：是否转译-->
<?php

 
 class maig {
 	function str($str){
  	$str = trim($str);
	if(!get_magic_quotes_gpc()){
		$str = addslashes($str);		
	}
	return htmlspecialchars($str);
  }
 }

?>