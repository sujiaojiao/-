<?php
	require_once 'islogin.php';
//	require_once "public/init.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta  charset="utf-8" />
<title>无标题</title>
</head>

<frameset rows="64,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="admin_top.php" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />
  <frameset cols="200,*"  rows="*" id="frame">
	<frame src="left.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame style="background: url(../images/timg2.png);background-size: 100% 100%;" src="right.php" name="main" marginwidth="3" marginheight="3" frameborder="2" scrolling="auto" target="_self" />
  </frameset>
<noframes>
  <body ></body>
    </noframes>
</html>