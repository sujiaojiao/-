<?php
	require_once 'islogin.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>添加管理员</title>
		<style type="text/css">
		 table{
	    		border: 0;
	    		border-collapse: collapse; 
	    	}
		</style>
	<!--<link href="images/skin.css" rel="stylesheet" type="text/css" />-->
		<script>
		function test()
		{
		    if(document.admin.username.value=='')
		    {
		      alert('请输入管理员账号');
		      return false;
		    }
		    if(document.admin.password.value=='')
		    {
		        alert('请输入管理员密码');
		        return false;
		    }
		 return true;   
		}
		</script>
	</head>

<body>
<table width="100%">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif">
    	<img src="../images/left-top-right.gif" width="17" height="29" />
    </td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
    	<table width="100%" height="31" id="table2">
      <tr>
        <td height="31">
        	<div>管理员管理</div>
        </td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="../images/mail_rightbg.gif">
    	<img src="../images/nav-right-bg.gif" width="16" height="29" />
    </td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
       <div>
<!---->
           <table width="98%"  align="center">
          <tr>
            <td>当前位置：添加管理员</td>
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
            <td>
            	<table width="100%" height="31">
	              <tr>
	                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;管理员基本信息</td>
	              </tr>
             	</table>
           </td>
          </tr>
          <tr>
            <td>
            	<table width="100%">
					<form name="admin" id="admin" method="POST" action="admin_addSava.php" onsubmit="return test();">
		              <tr>
		                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" >管理员账号：</td>
		                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
		                <td width="32%" height="30" bgcolor="#f2f2f2">
		                	<input name="username" type="text" id="username" size="30" />
		                </td>
		                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">登陆后台账号</td>
		              </tr>
		              <tr>
		                <td height="30" align="right" class="left_txt2">管理员密码：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="password" size="30" id="password" /></td>
		                <td height="30" class="left_txt">登陆后台密码</td>
		              </tr>
		              <tr>
		                <td height="30" align="right" bgcolor="#f2f2f2" class="left_txt2">管理员身份：</td>
		                <td bgcolor="#f2f2f2">&nbsp;</td>
		                <td height="30" bgcolor="#f2f2f2">
		                	<select name="rights" id="rights">
			                  <option value="2">普通管理员</option>
			                  <option value="1">超级管理员</option>
			                </select>
			             </td>
		                <td height="30" bgcolor="#f2f2f2">管理员权限,用于区分管理员可管理范围</td>
		              </tr>		             		 		              
		              <tr>
		                <td height="30" colspan="4" align="center">
		                	<input type="submit" name="button" id="button" value="创建" />
		                   &nbsp;
		                   <input type="reset" name="button2" id="button2" value="重置" /></td>
		                </tr>
		                </form>
		            </table>
            </td>
          </tr>
        </table>
                  <!---->
                  
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
