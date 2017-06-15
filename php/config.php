<!--配置环境页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
//	require_once '../plus/config.class.php';
    
    $db = new DbMysql();
	$result=$db->select("select * from webconfig");
	
	if(count($result)<1){
//		echo "小于一表示没有任何变量";
		echo "<script>alert('没有任何基本参数');location.href='config_add.php';</script>";
		exit;
	}
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
			a{
				text-decoration: none;
				color: #333333;
				font-size: 13.6px;
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
	            <td class="bgtext">当前位置：基本配置变量</td>
	          </tr>
	          <tr>
	            <td height="20">
		            <table width="100%" height="1" >
		              <tr>
		                <td>
		                	<div>
		                		<A href='config_add.php' >
		                			<img src="../images/add.gif" width="16" height="16" /> 添加新变量
		                		</a>            			
		                	</div>
		                </td>
		              </tr>             	              
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
	            <form name="admin" id="admin" method="POST" action="config_sava.php" onsubmit="return test();">
	            <table width="100%">
	         
	              <?php
	              	foreach($result as $row){
   	
	              	?>
	              <tr style="background:#f2f2f2;">
	                <td width="20%" height="30" align="right" ><?php echo $row["varshowname"]; ?></td>
	                <td width="3%" >&nbsp;</td>
	                <td width="35%" height="30" >
	                	<?php
	                	switch ($row["vartype"]) {                
                          case "string":
                              echo "<input type='text' value='".$row["varvalue"]."' name='".$row["varname"]."'>";
                              break;
                          case "bool":
                              if($row["varvalue"]=="Y"){
                               echo "<input type='radio' value='Y' name='".$row["varname"]."' checked> 是";
                               echo "<input type='radio' value='N' name='".$row["varname"]."'> 否";
                               
                               }else{                                                          
                               echo "<input type='radio' value='Y' name='".$row["varname"]."'> 是";
                               echo "<input type='radio' value='N' name='".$row["varname"]."' checked> 否";                                  
                              }
                              break;
                          case "strings":
                              echo "<textarea name='".$row["varname"]."'>".$row["varvalue"]."</textarea>";
                              break;
                   			 }
	                		
	                		?>
	                	
	                </td>
	                <td width="42%" height="30" class="bgtext"><?php echo $row["varinfo"]; ?></td>
	              </tr>
	              <?php
					}
	              	?>
	           
	              <tr style="background:#f2f2f2;">
	                <td height="30" colspan="4" align="center">
	                	<input type="submit" name="button" id="button" value="修改" />
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
