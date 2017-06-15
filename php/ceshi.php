<?php

	session_start();
	
	//echo $_SESSION["urlfile_info"];
	
	foreach($_SESSION["urlfile_info"] as $row=>$v)
	{
	    echo $row;
	    echo "<br>";
	    echo $v;
	    echo "<hr>";
	}
?>
