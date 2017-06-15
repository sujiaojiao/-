<!--配置环境页面-->
<?php
require_once 'islogin.php';
?>
<!DOCTYPE html>
<html >
	<head>
		<meta  charset="utf-8" />
		<title>配置页面</title>
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
		    if(document.admin.varshowname.value=='')
		      {
		         alert('请输入显示名称');
		         return false;
		      }
		    if(document.admin.varname.value=='')
		        {
		          alert('请输入变量名称');
		          return false;
		        }
		    if(document.admin.varinfo.value=='')
		        {
		            alert('请输入一个变量的描述');
		            return false;
		        }
		     if(document.admin.varvalue.value=='')
		         {
		             alert('请输入一个默认内容');
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
	    	<table width="100%" height="31"  id="table2">
			    <tr>
			        <td height="31"><div>基本配置</div></td>
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
	            <td class="bgtext">当前位置：添加基本配置变量</td>
	          </tr>
	          <tr>
	            <td height="20">
		            <table width="100%" height="1" bgcolor="#CCCCCC">
		              <tr> <td></td></tr>	               	              
		            </table>
	            </td>
	          </tr>
	          <tr>
	            <td>
		            <table width="100%" height="31">
		              <tr>
		                <td class="fonbac">基本配置变量信息</td>
		              </tr>
		            </table>
	           </td>
	          </tr>
	          <tr>
	            <td>	
	            <form name="admin" id="admin" method="POST" action="config_addSava.php" onsubmit="return test();">
	            <table width="100%">
	              <tr style="background:#f2f2f2;">
	                <td width="20%" height="30" align="right" >显示名称：</td>
	                <td width="3%">&nbsp;</td>
	                <td width="35%" height="30" >
	                	<input name="varshowname" type="text" id="varshowname" size="30" />
	                </td>
	                <td width="42%" height="30" class="bgtext">修改时候的文本提示</td>
	              </tr>		
	              <tr style="background:#f2f2f2;">
	                <td width="20%" height="30" align="right" >变量名称：</td>
	                <td width="3%" >&nbsp;</td>
	                <td width="35%" height="30" >
	                	<input name="varname" type="text" id="varname" size="30" />
	                </td>
	                <td width="42%" height="30" class="bgtext">变量名称,用于在使用的时候调用</td>
	              </tr>
	              <tr style="background:#f2f2f2;">
	                <td height="30" align="right">变量描述：</td>
	                <td>&nbsp;</td>
	                <td height="30">
	                	<input type="text" name="varinfo" size="30" id="varinfo" />
	                </td>
	                <td height="30" class="bgtext">变量描述,用于配置时候有一个提示</td>
	              </tr>
	              <tr style="background:#f2f2f2;">
	                <td height="30" align="right">变量类型：</td>
	                <td >&nbsp;</td>
	                <td height="30" style="font-size: 14px;">
	                	<input name="vartype" type="radio" id="radio" value="string" checked="checked" />文本 	                  
	                    <input type="radio" name="vartype" id="radio2" value="bool" />布尔值(是/否)                 
	                    <input type="radio" name="vartype" id="radio3" value="strings" />多行文本
	                   </td>
	                <td height="30" class="bgtext">配置时显示形式</td>
	              </tr>
	              <tr style="background:#f2f2f2;">
	                <td height="30" align="right" >变量内容：</td>
	                <td >&nbsp;</td>
	                <td height="30">
	                	<input type="text" name="varvalue" size="30" id="varvalue" />
	                </td>
	                <td height="30" class="bgtext">默认内容</td>
	              </tr>          
	 	            
	              <tr style="background:#f2f2f2;">
	                <td height="30" colspan="4" align="center">
	                	<input type="submit" name="button" id="button" value="创建" />
	                   &nbsp;</td>
	                </tr>
	               
	            </table> </form></td>
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
