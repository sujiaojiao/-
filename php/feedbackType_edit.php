<!--留言管理/留言修改页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	
	$db= new DbMysql();
	$id=$_GET["id"];
	
	
	$result=$db->select("select * from feedBackType where id=$id",1);
	
	$typename=$result["typename"];
	$typeorder=$result["typeorder"];
	$typezt=$result["typezt"];
	 

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>修改留言</title>
	<style type="text/css">
	   table{
		    border: 0;
			border-collapse: collapse; 
		}
		/*a{
			text-decoration: none;
			color: #003366;
		}*/
		.bgtext{
			font-size: 13.6px;
			color: #888888;	
		}
		.fonbac{
			background: #BFC4CA;
			font-weight:bold;
		}
	</style>
	<script>
	function test()
	{
	    if(document.admin.typename.value=='')
	        {
	            alert('请输入分类名称');
	            return false;
	        }
	     if(document.admin.typeorder.value=='')
	         {
	          alert('请输入分类的排序');
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
	    	<img src="images/left-top-right.gif" width="17" height="29" />
	    </td>
	    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
	      <table width="100%" height="31" id="table2">
		      <tr> <td height="31"><div>留言管理</div></td></tr>		       		      
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
	          <tr> <td class="bgtext">当前位置：修改留言分类</td></tr>    
	          <tr>
	            <td height="20">
		            <table width="100%" height="1" bgcolor="#CCCCCC">
		              <tr><td></td></tr>   
		            </table>
	            </td>
	          </tr>
	          <tr>
	            <td>
		            <table width="100%" height="31">
		              <tr><td class="fonbac">留言分类信息</td></tr>       
		            </table>
	            </td>
	          </tr>
	          <tr>
	            <td>
	            <table width="100%">
				<form name="admin" id="admin" method="POST" action="feedbackType_editSava.php" onsubmit="return test();">
	              <tr style="background:#f2f2f2 ;">
	                <td width="20%" height="30" align="right">分类名称：</td>
	                <td width="3%">&nbsp;</td>
	                <td width="32%" height="30">
	                	<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<input name="typename" type="text" id="typename" size="30" value="<?php echo $typename;?>" />
	                </td>	          
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td width="20%" height="30" align="right">分类排序：</td>
	                <td width="3%">&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="typeorder" type="text" id="typeorder"  size="30" value="<?php echo $typeorder;?>"/>
	                </td>
	                <td width="45%" height="30" class="bgtext">顺序排序</td>
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td width="20%" height="30" align="right">显示状态：</td>
	                <td width="3%">&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="typezt" type="radio" id="radio" value="1" <?php if($typezt==1) echo "checked";?>  />
	                 	<label for="typezt">开启 
	                    	<input type="radio" name="typezt" id="radio2" value="0" <?php if($typezt==0) echo "checked";?> />
	                    </label>  关闭
	                </td>
	                <!--<td width="45%" height="30"  class="left_txt"></td>-->
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" colspan="4" align="center">
	                	<input type="submit" name="button" id="button" value="修改" />&nbsp;
	                    <input type="reset" name="button2" id="button2" value="重置" /></td>
	                </tr>
	                </form>
	            </table>
	            </td>
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
