<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/page.class.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>无标题文档</title>
	    <style>
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
		                 <td>当前位置：管理员列表</td>
		               </tr>
			          <tr>
			            <td height="20">
				            <table width="100%" height="1">
				              <tr>
				                <td>
				                	<div>
				                		<A href='admin_add.php' ><img src="../images/add.gif" width="16" height="16" /> 添加管理员</a>
				                			
				                	</div>
				                </td>
				              </tr>
				            </table>
			            </td>
			          </tr>
		          <tr>
		            <td>
		            	<table width="100%" height="31" class="nowtable">
		              <tr class="fonbac">
		                <td>&nbsp;&nbsp;&nbsp;&nbsp;登陆账号</td>
		                <td>权限</td>
		                <td>最后登陆时间</td>
		                <td>最后登陆IP</td>
		                <td>登陆次数</td>
		                <td>操作</td>
		              </tr>
		                    <?php
		                    $admin= new DbMysql();
		                    $pagesize=10;
		                    $admin->sql("select * from admin");
		                    $infocount=$admin->affected();
		                    $page = new page($infocount,$pagesize);
		                    $result=$admin->select("select * from admin ".$page->limit());
		                    foreach ($result as $row){
		                    ?>
		              <tr style="background:#F2F2F2 ;">
		                <td><?php echo $row["username"];?></td>
		                <td><?php 
		                if($row["rights"]==1){		                
		                    echo "超级管理员";
		                }else{ 
		                    echo "普通管理员";
		                }
		                ?></td>
		                <td><?php echo date("Y-m-d h:i:s",$row["loginTime"]);?></td>
		                <td><?php echo $row["ip"];?></td>
		                <td><?php echo $row["loginSum"];?></td>
		                <td>
		                	<?php
		                	if($_SESSION["username"]==$row["username"]){
		                		echo "删除";
		                	}else{
		                	?>
		                	<a href='admin_del.php?id=<?php echo $row["id"];?>'>删除</a>
		                	<?php
							}
		                		?>
		                	<a href="admin_edit.php?id=<?php echo $row["id"];?>">修改</a>
		                </td>
		              </tr>
		                    <?php
		                    }
		                    ?>
		            </table></td>
		          </tr>
		 
		        </table>
		        <div style="text-align: center;margin-top: 10px;" id="page"><?php 
		        
		        echo $page->show(1);
		        ?></div>
		        </div>    
		    </td>
		    <td background="../images/mail_rightbg.gif">&nbsp;</td>
		  </tr>
		  <tr>
		    <td valign="middle" background="../images/mail_leftbg.gif">
		    	<img src="../images/buttom_left2.gif" width="17" height="17" />
		    </td>
		    <td height="17" valign="top" background="images/buttom_bgs.gif">
		      	<img src="../images/buttom_bgs.gif" width="17" height="17" />
		    </td>
		    <td background="../images/mail_rightbg.gif">
		    	<img src="../images/buttom_right2.gif" width="16" height="17" />
		    </td>
		  </tr>
		</table>
	</body>
</html>