<?php
	require_once 'islogin.php';
		
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/index.css" />
		<title></title>
		<style>
			table{
		    	border: 0;
		    	border-collapse: collapse; 
	    	}
		</style>
		<script language="JavaScript">
			function logout(){
				if (confirm("您确定要退出控制面板吗？"))
				top.location = "outLogin.php";
				return false;
			}
		</script>
		<script language="JavaScript">
			function showsubmenu(sid) {
				var whichEl = eval("submenu" + sid);
				var menuTitle = eval("menuTitle" + sid);
				if (whichEl.style.display == "none"){
					eval("submenu" + sid + ".style.display=\"\";");
				}else{
					eval("submenu" + sid + ".style.display=\"none\";");
				}
			}
		</script>
		<meta http-equiv=Content-Type content=text/html;charset="utf-8">
		<meta http-equiv="refresh" content="60">
		<script language=JavaScript1.2>
		function showsubmenu(sid) {
			var whichEl = eval("submenu" + sid);
			var menuTitle = eval("menuTitle" + sid);
			if (whichEl.style.display == "none"){
				eval("submenu" + sid + ".style.display=\"\";");
			}else{
				eval("submenu" + sid + ".style.display=\"none\";");
			}
		}
		</script>
	</head>
	<body>
		<table width="100%" height="64"  class="admin_topbg">
			<tr>				
				<td width="61%" height="64">
					<!--<img src="../images/timg5.jpg" width="262" height="64">-->
						
					</td>
				<td width="39%" valign="top">
					<table width="100%">
						<tr>
							<td width="74%" height="38" class="admin_txt">管理员：<b style="color: #D0707E;"><?php echo $_SESSION["username"];?></b> 您好,感谢登陆使用！</td>
							<td width="22%">
								<a href="#" target="_self" onClick="logout();">
									<img src="../images/out.gif" alt="安全退出" width="46" height="20" border="0">									
								</a>
							</td>
							<td width="4%">&nbsp;</td>
						</tr>
						 <tr>
				        	<td height="19" colspan="3">&nbsp;</td>
				        </tr>
					</table>					
				</td>
			</tr>
		</table>
	</body>

</html>
