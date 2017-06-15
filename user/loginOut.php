<meta charset="utf-8" />
<?php
require "../public/init.php";
session_destroy();
$_SESSION=array();

webAlter("退出成功","$webdir");

?>