<!--商品评论/商品修改页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	$id=$_GET["id"];
	$db= new DbMysql();
	
	$result=$db->select("select * from assess where id=$id",1);
	
	$pid=$result["pid"];
	$issh=$result["issh"];
	$istop=$result["istop"];
	$recommend=$result["recommend"];
	$pinglun=$result["pinglun"];
	$content=$result["content"];
	$usernameshow=$result["usernameshow"];

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>修改评论信息</title>
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
				font-weight:bold;
			}
	</style>
	<script>
	function test(){	
		if(document.admin.pid.value==''){		
			alert('商品ID不能为空');
			return false;
		}	
		if(document.admin.content.value==''){		
			alert('评论内容不能为空');
			return false;
		}
		if(document.admin.usernameshow.value==''){		
			alert('提交人不能为空');
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
		      <tr> <td height="31"><div>评论管理</div></td> </tr>		       		     
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
	            <td class="bgtext">当前位置：修改评论</td>
	          </tr>
	          <tr>
	            <td height="20">
	            <table width="100%" height="1" bgcolor="#CCCCCC">
	              <tr> <td></td></tr>  
	            </table></td>
	          </tr>
	          <tr>
	            <td>
		            <table width="100%" height="31">	             
		                <tr> <td class="left_bt2">评论管理基本信息</td> </tr>	             
		            </table>
	            </td>
	          </tr>
	          <tr>
	            <td>
	            	<form name="admin" id="admin" method="POST" action="assess_editSava.php" onsubmit="return test();">
	            	<table width="100%">				
	              <tr style="background:#f2f2f2 ;">
	                <td width="10%" height="30" align="right">所属商品：</td>
	                <td width="1%">&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="id" type="hidden" value="<?php echo $id;?>">
	                	<input name="pid" type="text" id="pid" size="30" value="<?php echo $pid;?>" />
	                </td>
	                <td width="45%" height="30" class="bgtext">关联的是商品的ID号</td>
	              </tr>
	              
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right" >信息状态：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30">
	                	<input type="radio" name="issh" id="radio" value="0" <?php if($issh==0) echo "checked";?>/>待审核 
	                    <input name="issh" type="radio" id="radio2" value="1" <?php if($issh==1) echo "checked";?> />
	                    <label for="issh"></label>已审核
	                    <label for="issh"></label></td>
	                <td width="45%" height="30" class="bgtext">待审核的信息在前台不显示</td>
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right">置顶状态：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30">
	                	<input type="radio" name="istop" id="radio3" value="0" <?php if($istop==0) echo "checked";?> />待置顶 
	                    <input name="istop" type="radio" id="radio4" value="1" <?php if($istop==1) echo "checked";?> />
	                    <label for="istop">已置顶</label></td>
	                <!--<td width="45%" height="30" " class="left_txt"></td>-->
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right">推荐状态：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30">
	                	<input type="radio" name="recommend" id="radio3" value="0" <?php if($recommend==0) echo "checked";?> />待推荐 
	                    <input name="recommend" type="radio" id="radio4" value="1" <?php if($recommend==1) echo "checked";?>/>
	                    <label for="recommend">已推荐</label></td>
	                <!--<td width="45%" height="30" ></td>-->
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right" >评论等级：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30"><label for="pinglun"></label>
	                  <select name="pinglun" id="pinglun">
	                    <option value="1" <?php if($pinglun==1) echo "selected";?>>一星</option>
	                    <option value="2" <?php if($pinglun==2) echo "selected";?>>二星</option>
	                    <option value="3" <?php if($pinglun==3) echo "selected";?>>三星</option>
	                    <option value="4" <?php if($pinglun==4) echo "selected";?>>四星</option>
	                    <option value="5" <?php if($pinglun==5) echo "selected";?>>五星</option>
	                  </select></td>
	                <!--<td width="45%" height="30"  class="left_txt"></td>-->
	              </tr>
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right">评论内容：</td>
	                <td>&nbsp;</td>
	                <td height="30" colspan="2"> 
	                  <textarea name="content" id="content" cols="45" rows="5"><?php echo $content;?></textarea></td>
	                </tr>
	                          
	              <tr style="background:#f2f2f2 ;">
	                <td height="30" align="right">提交用户：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="usernameshow" type="text" id="usernameshow" size="30" value="<?php echo $usernameshow;?>" />
	                </td>
	                <td width="45%" height="30" class="bgtext">前台显示提交人姓名,可以是一个虚拟人</td>
	              </tr>
	 
	              <tr>
	                <td height="30" colspan="4" align="center">
	                	<input type="submit" name="button" id="button" value="修改" />&nbsp;
	                   
	                   <input type="reset" name="button2" id="button2" value="重置" /></td>
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
