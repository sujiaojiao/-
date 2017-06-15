<?php
    session_start();
	header("content-type: image/png");     
	$img = imagecreatetruecolor(70,35); //创建画布 
	$black = imagecolorallocate($img,0x00,0x00,0x00);  //背景色以及文本颜色
	$green = imagecolorallocate($img,0x00,0xFF,0x00);  
	$white = imagecolorallocate($img,150,150,150);  
	
	imagefill($img,0,0,$white);  
	//生成随机的验证码  
	$code = '';  
	for($i = 0; $i < 4; $i++) {  
	    $code .= rand(0, 9);  
	}  
	$_SESSION['rand'] = $code;  //存储验证码  
	imagestring($img, 33, 15, 10, $code, $black);  
	//加入噪点干扰  
	for($i=0;$i<200;$i++) {  
	  imagesetpixel($img, rand(0,100) , rand(0,100) , $black);   
	  imagesetpixel($img, rand(0,100) , rand(0,100) , $green);  
	}  
	//输出验证码  	 
	imagepng($img);  
	imagedestroy($img); 
//	

 
	
	?>