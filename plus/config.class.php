<!--配置文件封装类-->
<?php
   class config{
   	
	 function configUp(){
	 	
		$db = new DbMysql();
	  	$result = $db->select("select * from webconfig");
	   
//	  	foreach($result as $row){
//	   	echo $row["varname"];
//		echo "<hr>";
//	   }
	   
	    $filename = "../config/config.php";
		if(file_exists($filename)){	
			//有的话开始对文件操作；
			//写入
			$ft = fopen($filename, "w");
			flock($ft, 3);
			fwrite($ft, "<?php\r\n");
			foreach($result as $row){
				fwrite($ft,"$".$row["varname"]."='".$row["varvalue"]);
				fwrite($ft, "';\r\n");
			}
			fwrite($ft, "?>");
			fclose($ft);
		}else{
			file_put_contents($filename, "");
		}
	 }
	  
   }
?>