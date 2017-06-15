<!--商品管理/商品分类/添加新分类页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/ProductType.class.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>添加新分类</title>
		<style type="text/css">
		table{			
			border: 0;
			border-collapse: collapse; 
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
		
		<script>
		function test()
		{
		 if(document.admin.typename.value=='')
		 {
		     alert('请填写分类名称');
		     return false;
		 }
		return true; 
		}
		</script>
	</head>
	
	<body>
	<table width="100%" >
	  <tr>
	    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif">
	    	<img src="../images/left-top-right.gif" width="17" height="29" />
	    </td>
	    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
	    	<table width="100%" height="31" id="table2">
		      <tr>
		        <td height="31"><div>商品分类</div></td>
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
	<!---->
	        <table width="98%" align="center">
	          <tr>
	            <td class="bgtext">当前位置：添加商品分类</td>
	          </tr>
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
		              <tr>
		                <td class="fonbac">&nbsp;&nbsp;&nbsp;&nbsp;分类信息</td>
		              </tr>
		            </table>
		        </td>
	          </tr>
	          <tr>
	            <td>
	            <table width="100%" >
				<form name="admin" id="admin" method="POST" action="productList_addSava.php" onsubmit="return test();">
	            <tr>
	                <td width="20%" height="30" align="right" bgcolor="#f2f2f2">所属分类：</td>
	                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
	                <td width="32%" height="30" bgcolor="#f2f2f2">
		                <select name="tid" id="tid">
		                  <option value="0">一级分类</option>
		                  <?php
		                  $ptype = new ProductType();                 
		                  $menu = $ptype->floption(0);
		                  echo $menu;
		                  ?>
		                </select>
		            </td>
	                <td width="45%" height="30" bgcolor="#f2f2f2"></td>
	            </tr>
	            <tr id="logotr" style="background:#f2f2f2;">
	                <td height="30" align="right" >图片地址：</td>
	                <td >&nbsp;</td>
	                <td width="32%" height="20" >
	                	<label for="picurl"></label>
	                  <input name="picurl" type="text" id="picurl" size="30" />
	                </td>
	                <td width="45%" height="30" style="padding-top: 24px;box-sizing: border-box;">
	                	<iframe src="uploadPic.php" frameborder="0" width="350" height="30"></iframe>&nbsp;
	                </td>
	              </tr>
	            <tr>
	                <td width="20%" height="30" align="right" bgcolor="#f2f2f2">分类名称：</td>
	                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
	                <td width="32%" height="30" bgcolor="#f2f2f2">
	                	<input name="typename" type="text" id="typename" size="30" />
	                </td>
	                <td width="45%" height="30" bgcolor="#f2f2f2"></td>
	            </tr>
	            <tr>
	                <td height="30" colspan="4" align="center" class="left_txt">
	                	<input type="submit" name="button" id="button" value="创建" />&nbsp;	                 
	                   <input type="reset" name="button2" id="button2" value="重置" />
	                </td>
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
