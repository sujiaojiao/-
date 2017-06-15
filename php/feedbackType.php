<!--留言管理/留言分类-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/page.class.php';
	$db= new DbMysql();
	
	$sql="select id,typename,typeorder,typezt from feedbackType ";
	$parm=" where 1  ";	
	$sql.=$parm;
	
	$db->sql($sql);
	
	$infocount=$db->affected(); //信息总数量
	$pagesize=20;
	
	$page = new page($infocount, $pagesize);
		
	$sql.=$page->limit();
	$result=$db->select($sql);

?>
<!DOCTYPE html>
<html >
	<head>
	<meta charset="utf-8" />
	<title>无标题文档</title>
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
	function goupdate(zt)
	{
		document.goinfo.zt.value=zt;
		document.goinfo.action="feedbackType_update.php";
		document.goinfo.submit();
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
		      <tr><td height="31"><div>留言分类</div></td> </tr>
		        
		     
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
	        <tr><td class="bgtext">当前位置：留言本分类</td></tr>    
	        <tr>
	            <td height="20">	                 
	                <table width="100%" height="1" >
		              <tr>
		                <td>
		                	<div class="add"><A href='feedbackType_Add.php'>
		                		<img src="../images/add.gif" width="16" height="16" /> 添加留言本分类</a>
		                	</div>
		                </td>
		              </tr>
		            </table>
		        </td>
	        </tr>
	        <tr>
	          <td> 
	           <form action="feedbackType_allDel.php" method="post" name="goinfo">
	            <table width="100%" height="31">
	              <tr class="fonbac">
	                <td width="15"></td>
	                <td>排序</td>
	                <td>分类名称</td>
	                <td>ID</td>
	                <td>状态</td>
	                <td>操作</td>
	              </tr> 
	               <?php
			        if($infocount>=1){			        
	                    foreach($result as $row){	                    
	                ?>
	              <tr style="background:#F2F2F2 ;">
	                <td><input name="id[]" type="checkbox" value="<?php echo $row["id"];?>" /></td>
		            <td><input name="typeorder<?php echo $row["typeorder"];?>" type="text" value="<?php echo $row["typeorder"]?>" size="5" /></td>
		            <td><?php echo $row["typename"];?></td>
		            <td><?php echo $row["id"];?></td>
		            <td><?php 
		              if($row["typezt"]==1){	              
		                  echo "开启";
		              }else {   
		                  echo "<span style='color:red;font-weight:bold;'>关闭</span>";
		              }
		              ?></td>
		         
		            <td><a href="feedbackType_del.php?id=<?php echo $row["id"];?>">删除</a> 
		              	 <a href="feedbackType_edit.php?id=<?php echo $row["id"];?>">修改</a>	              		
		            </td>
	              </tr> 
	              <?php
	                }}else{	      
				           echo "<tr><td colspan='6'><div style='font-weight:bold;color:red;text-align:center;'>暂无数据</div></td></tr>";
				      }	      
	               ?>
	                <tr>
	                   <td colspan="6">
	                	<input name="" type="submit" value="批量删除" />
	                	<input name="" type="button" onclick="goupdate(1);" value="设置开启" />
	                    <input name="input" type="button" onclick="goupdate(0);" value="设置关闭" />
	                    <input name="zt" type="hidden" />
	                  </td>
	                </tr>
	            </table>
	         
	            </form>
	           </td>
	        </tr>
	 
	       </table>
	       <div id="page" style="width: 100%;text-align: center;">
	       	 <?php echo $page->show(1);?>	       	 	
	       	 </div>
	                  
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
