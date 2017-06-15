
<?php

function weberror($title="错误页面",$info="您的操作未能成功"){
	
	global $webdir,$webname;
	include WEBDTR."/public/error.php";
//	echo WEBDTR;
	exit;
}

//跳转
 function webAlter($title,$url){
    echo "<script>alert('$title');location.href='$url';</script>";
    exit;
}
 
	 //IP
	function getIP(){
	    return $_SERVER["REMOTE_ADDR"]; 
	}
	//字符
	function strLeft($str,$leng=10,$sl=''){
	
	    $strleng=mb_strlen($str,"utf-8");
	    if($strleng>$leng){
	        return mb_substr($str, 0,$leng,"utf-8").$sl;
	    }else{
	        return $str;
	    }
	     
	}
	
	
	//过滤字符串
	    function guolvStr($str){
	            $str=trim($str);
	       if(!get_magic_quotes_gpc())
	     {
	        $str=addslashes($str);
	     }
	      return htmlspecialchars($str);
	        
	    }
?>