<?php
	require_once 'islogin.php';
//	require_once '../plus/DbMysql.php';
	
	
//	$id=$_GET["id"];
//	echo $id;	 
//	$edit = new DbMysql();
//	$result=$edit->select("select * from admin where id=$id",1);	
//   echo $result["username"];
	 
//	$username=$result["username"];
//	$password=$result["password"];
//	$rights=$result["rights"];
	
//	echo $username.$password.$rights;
//   exit;
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>无标题文档</title>
	<style type="text/css">
		table{
		    	border: 0;
		    	border-collapse: collapse; 
	    	}
	</style>
	<!--<link href="../images/skin.css" rel="stylesheet" type="text/css" />-->
	<script>
	function test()
	{	   	    
	    if(document.admin.password.value=='')
	    {
	        alert('请输入管理员密码');
	        return false;
	    }	    
	 return true;   
	}
//	</script>
	</head>

	<body>
	<table width="100%">
	  <tr>
	    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif">
	    	<!--<img src="../images/left-top-right.gif" width="17" height="29" />-->
	    </td>
	    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
	    	<table width="100%" height="31" id="table2">
	      <tr>
	        <td height="31"><div>管理员管理</div></td>
	      </tr>
	    	</table>
	    </td>
	    <td width="16" valign="top" background="../images/mail_rightbg.gif">
	    	<img src="../images/nav-right-bg.gif" width="16" height="29" />
	    </td>
	  </tr>
	  <tr>
	    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
	    <td valign="top" bgcolor="#F7F8F9">
	       <div>
	            <table width="98%" align="center">
	          <tr>
	            <td>当前位置：修改管理员密码</td>
	          </tr>
	          <tr>
	            <td height="20">
	            	<table width="100%" height="1" bgcolor="#CCCCCC">
	              <tr>
	                <td></td>
	              </tr>
	            	</table>
	            </td>
	          </tr>
	          <tr>
	            <td><table width="100%" height="31">
	              <tr>
	                <td>&nbsp;&nbsp;&nbsp;&nbsp;管理员基本信息</td>
	              </tr>
	            </table>
	            </td>
	          </tr>
	          <tr>
	            <td>
	            	<table width="100%">
	                    <form name="admin" id="admin" method="POST" action="admin_pwdSava.php?" onsubmit="return test();">
	              <tr>
	                <td width="20%" height="30" align="right" bgcolor="#f2f2f2">管理员账号：</td>
	                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
	                <td width="32%" height="30" bgcolor="#f2f2f2">
	                	
	                	<input name="username" type="hidden" id="username" size="30" value="<?php echo $_SESSION['username']; ?>" /><?php echo $_SESSION["username"]; ?></td>
	                <td width="45%" height="30" bgcolor="#f2f2f2">登陆后台账号</td>
	              </tr>
	              <tr>
	                <td height="30" align="right">管理员密码：</td>
	                <td>&nbsp;</td>
	                <td height="30">
	                	<input type="text" name="password" size="30" id="password" value=""/>
	                </td>
	                <td height="30">登陆后台密码</td>
	              </tr>
	                 
	              <tr>
	                <td height="30" colspan="4" align="center"><input type="submit" name="button" id="button" value="修改密码" />
	                   &nbsp;
	                   <input type="reset" name="button2" id="button2" value="重置" /></td>
	                </tr>
	                </form>
	            </table></td>
	          </tr>
	        </table>
	                  
	        </div>    
	    </td>
	    <td background="../images/mail_rightbg.gif">&nbsp;</td>
	  </tr>
	  <tr>
	    <td valign="middle" background="../images/mail_leftbg.gif">
	    	<img src="../images/buttom_left2.gif" width="17" height="17" />
	    </td>
	    <td height="17" valign="top" background="../images/buttom_bgs.gif">
	      	<img src="../images/buttom_bgs.gif" width="17" height="17" />
	     </td>
	    <td background="../images/mail_rightbg.gif">
	    	<img src="../images/buttom_right2.gif" width="16" height="17" />
	    </td>
	  </tr>
	</table>
	</body>
</html>
