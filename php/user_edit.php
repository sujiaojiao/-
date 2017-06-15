<!--会员管理/会员修改-->
<?php
	require_once 'islogin.php';
	require_once "../plus/DbMysql.php";
	
	$id = $_GET["id"];
//	echo $id;
	$db = new DbMysql();
	$result = $db->select("select * from user where id=$id",1);
	$username = $result["username"];
	$password = $result["password"];
	$email = $result["email"];
	$tiwen = $result["tiwen"];
	$huida = $result["huida"];
	$zt = $result["zt"];
	$xingming = $result["xingming"];
	$sex = $result["sex"];
	$mobile = $result["mobile"];			
//	echo $id;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>修改会员</title>
		<style type="text/css">
			table{
	    		border: 0;
	    		border-collapse: collapse; 
	    	}
	    	a{
	    		text-decoration: none;
	    		color: #003366;
	    	}
	    	.bgtext{
				font-size: 13.6px;
				color: #888888;
			}
			.fonbac{
				background: #BFC4CA;
				font-weight: 500;
			}
		</style>
	<!--<link href="images/skin.css" rel="stylesheet" type="text/css" />-->
		<script>
		function test()
		{
		    if(document.admin.username.value=='')
		    {
		      alert('请输入会员账号');
		      return false;
		    }
		    
//		    if(document.admin.email.value=='')
//		    {
//		      alert('请输入会员账号');
//		      return false;
//		    }
		    
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
        	<div>会员管理</div>
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
            <td class="bgtext">当前位置：修改会员</td>
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
	                <td class="fonbac">会员基本信息</td>
	              </tr>
             	</table>
           </td>
          </tr>
          <tr>
            <td>
            	
					<form name="admin" id="admin" method="POST" action="user_editSava.php?id=<?php echo $id;?>" onsubmit="return test();">
		              <table width="100%">
		              <tr style="background:#f2f2f2 ;">
		                <td width="20%" height="30" align="right"  >会员账号：</td>
		                <td width="3%" >&nbsp;</td>
		                <td width="32%" height="30" >
		                	<input name="username" type="text" id="username" size="30" value="<?php echo $username; ?>"/>
		                </td>
		                <td width="45%" height="30"  class="bgtext">会员的登陆账号</td>
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right" >会员密码：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="password" size="30" id="password"/></td>
		                <td height="30" class="bgtext">登陆密码如果无需重置，则不需要填写</td>
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right" >会员邮箱：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="email" size="30" id="email" value="<?php echo $email;?>"/></td>
		            
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right">提问问题：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="tiwen" size="30" id="tiwen" value="<?php echo $tiwen; ?>"/></td>
		                <td height="30" class="bgtext">用于找回密码</td>
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right">回答问题：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="huida" size="30" id="huida" value="<?php echo $huida; ?>"/></td>
		                <td height="30" class="bgtext">用于找回密码</td>
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right"  >状态：</td>
		                <td >&nbsp;</td>
		                <td height="30"> 
		                	<select name="zt" id="zt">
			                  <option value="1" <?php if($zt == 1){echo "selected";}
			                  	?>>待审核</option>
			                  <option value="2"
			                  <?php if($zt == 2){echo "selected";}
			                  	?>>正常</option>
			                  <option value="3"
			                 <?php if($zt == 3){echo "selected";}
			                  	?>>锁定</option>
			                </select>
			             </td>
		                
		              </tr>	
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right">真实姓名：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="xingming" size="30" id="xingming" value="<?php echo $xingming;?>"/></td>
		                
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right">称为：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<select name="sex" id="sex">
			                  <option value="先生" <?php if($sex == '先生'){echo "selected";}?>>先生</option>
			                  <option value="女士" <?php if($sex == '女士'){echo "selected";}?>>女士</option>
			                  
			                </select>
			             </td>
		               
		              </tr>
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" align="right">手机号码：</td>
		                <td>&nbsp;</td>
		                <td height="30">
		                	<input type="text" name="mobile" size="30" id="mobile" value="<?php echo $mobile; ?>"/></td>
		                
		              </tr>	             		 		              
		              <tr style="background:#f2f2f2 ;">
		                <td height="30" colspan="4" align="center">
		                	<input type="submit" name="button" id="button" value="修改" />
		                   &nbsp;
		                   <input type="reset" name="button2" id="button2" value="重置" /></td>
		                </tr>		               
		            </table>
		        </form>
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
