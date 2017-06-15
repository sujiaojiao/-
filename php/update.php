<!--商品深度的更新 -->
<?php

	require_once '../plus/DbMySQL.PHP';
	require_once '../plus/ProductType.class.php';
	
	$update = new ProductType();
	echo $update->updateSd(17, 1)
        
?>
