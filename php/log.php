<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/page.class.php';
	        
	$pagesize=5;
	
	$log = new DbMysql();
	$log->sql("select * from adminLog");
	$infocount=$log->affected();
//	$page = new page(20,$pagesize);
	$page = new page($infocount,$pagesize);
//echo $page->limit();
 
        
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>后台管理日志</title>			
			<link href="images/skin.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
		    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
		      <tr>
		        <td height="31"><div class="titlebt">登陆日志</div></td>
		      </tr>
		    </table></td>
		    <td width="16" valign="top" background="../images/mail_rightbg.gif"><img src="../images/nav-right-bg.gif" width="16" height="29" /></td>
		  </tr>
		  <tr>
		    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
		    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
		      <tr>
		        <td height="13" valign="top">&nbsp;</td>
		      </tr>
		      <tr>
		        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		          <tr>
		            <td class="left_txt">当前位置：查看后台管理员登陆日志</td>
		          </tr>
		          <tr>
		            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
		              <tr>
		                <td></td>
		              </tr>
		            </table></td>
		          </tr>
		   
		          <tr>
		            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
		              <tr  bgcolor="#999999" style="text-align: center;">
		                 <td style="width: 20%;"  class="left_bt2">登陆账号</td>
			             <td style="width: 20%;" class="left_bt2">登陆密码</td>
			             <td style="width: 20%;" class="left_bt2">登陆时间</td>
			             <td style="width: 10%;" class="left_bt2">登陆IP</td>
			             <td style="width: 20%;" class="left_bt2">状态</td>
			             <td style="border: 1px solid redwidth: 10%;" class="left_bt2">操作</td>
		              </tr>
		            </table></td>
		          </tr>
		          <?php
		         
		          $result=$log->select("select * from adminLog order by id desc ".$page->limit());
//              
		          foreach ($result as $row){
		          ?>
		            <tr>
		            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" >
		              <tr style="text-align: center;" class='left_txt2'>
		                <td style="text-align: center;width: 20%;"><?php echo $row["username"].$row["id"];?></td>
		                <td style="text-align: center;width: 20%;"><?php echo $row["password"];?></td>
		                <td style="text-align: center;width: 20%;" ><?php echo date("Y-m-d h:i:s",$row["addtime"]);?></td>
		                <td style="text-align: center;width: 10%;" ><?php echo $row["ip"];?></td>
		                <td style="text-align: center;width: 20%;" ><?php 
		                
		                if($row["state"]==1)
		                  {
		                    echo "正常登陆";
		                  }
		                 if($row["state"]==-1)
		                  {
		                     echo "<i>密码错误</i>";
		                  } 
		                  if($row["state"]==-2)
		                  {
		                     echo "<b>账户不存在</b>"; 
		                  }
		                    ?></td>
		                <td style="width: 20%;text-align: center;">
		                    <?php
		                     if($_SESSION["rights"]!=1)
		                     {
		                       echo "删除";
		                     }
		                     else
		                     {
		                    ?>
		                     <a href='logDel.php?id=<?php echo $row["id"];?>'>删除</a>
		                <?php
		                      }
		                ?>
		                </td>
		              </tr>
<!--//		              <?php
//		              	
//		              	?>-->
		            </table></td>
		          </tr>
		     <?php
		          }
		     ?>
		        </table>
		      <div style="text-align:center;height:50px;line-height:50px;">  <?php
		        
//		      echo $_SESSION["rights"];
//				echo $page->hello();
				echo $page->show(2);
		
		        ?>
		        </div>
		        </td>
		      </tr>
		    </table></td>
		    <td background="../images/mail_rightbg.gif">&nbsp;</td>
		  </tr>
		  <tr>
		    <td valign="middle" background="../images/mail_leftbg.gif"><img src="../images/buttom_left2.gif" width="17" height="17" /></td>
		      <td height="17" valign="top" background="../images/buttom_bgs.gif"><img src="../images/buttom_bgs.gif" width="17" height="17" /></td>
		    <td background="../images/mail_rightbg.gif"><img src="../images/buttom_right2.gif" width="16" height="17" /></td>
		  </tr>
		</table>
		</body>
</html>