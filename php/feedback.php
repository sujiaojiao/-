<!--留言管理/留言内容-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/page.class.php';
	
	$db = new DbMysql();
	
	$sql="select feedback.id,feedback.typeid,feedback.issh,feedback.ishf,feedback.usernameshow,feedback.addtime,feedback.ip,feedbackType.typename from feedback inner join feedBackType on feedback.typeid=feedbackType.id ";
	$parm=" where 1 ";
	
	// 判断审核状态
	$issh=@$_GET["issh"];
	if($issh!="")
	{
	    $parm.=" and feedback.issh='$issh' ";
	}
	
	//判断回复状态
	$ishf=@$_GET["ishf"];
	if($ishf!="")
	{
	    $parm.=" and feedback.ishf='$ishf' ";
	}
	
	//判断管理员状态
	$isadmin=@$_GET["isadmin"];
	if($isadmin=="ok")
	{
	    $parm.=" and feedback.ip='管理员' ";
	}
	
	//判断分类
	$typeid=@$_GET["typeid"];
	if($typeid!="")
	{
	    $parm.=" and feedback.typeid='$typeid' ";
	}
	
	
	//关键词判断
	$key=@$_GET["key"];
	if($key!="")
	{
	    $parm.=" and feedback.content like '%$key%' ";
	}
	
	$sql.=$parm;
	$sql.=" order by id desc ";
	$db->sql($sql);
	$infocount=$db->affected();  //信息总数量
	$pagesize=20;
	
	$page = new page($infocount,$pagesize);
	
	$sql.=$page->limit();
	$result=$db->select($sql);


?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>文章管理</title>
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
	function goupdate(ziduan,zt){	
		document.goinfo.ziduan.value=ziduan;
		document.goinfo.zt.value=zt;
		document.goinfo.action="feedback_update.php";
		document.goinfo.submit();
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
		      <tr>
		        <td height="31"><div>售前咨询</div></td>
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
	            <td class="bgtext">当前位置：留言信息列表</td>
	          </tr>
	          <tr>
	            <td height="20">
	                <div style="font-size:12px;line-height:25px;">查看：
	                	<a href="feedback.php">全部</a> 
	                	<a href="?issh=1">已审核</a> 
	                	<a href='?issh=0'>待审核</a> 
	                	<a href="?ishf=1">已回复</a>
	                    <a href="?ishf=0">待回复</a>
	                    <a href="?isadmin=ok">管理员</a>
	                </div>
	                <table width="100%" height="1">
	              <tr>
	                <td>
	                	<div class="add"><A href='feedback_add.php'>
	                		<img src="../images/add.gif" width="16" height="16" /> 添加留言</a>
	                	</div>
	                </td>
	                <td width="150" align="right">
					<select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value">
					    <option value="feedback.php">查看全部</option>       
					<?php
				       $typeInfo = $db->select("select id,typename from feedbackType where typezt=1  order by typeorder ");
				       foreach($typeInfo as $row)
				       {
				           if($typeid==$row["id"])
				           {
				         echo "<option value='?typeid=".$row["id"]."' selected>".$row["typename"]."</option>";      
				           }
				           else{
				           echo "<option value='?typeid=".$row["id"]."'>".$row["typename"]."</option>";
				           }
				       
				       }
				       ?>
				</select></td>
	              </tr>
	            </table></td>
	          </tr>
	          <tr>
	            <td>
	          <form action="feedback_alldel.php" method="post" name="goinfo">
	            <table width="100%" height="31">
	              <tr class="fonbac">
	                <td></td>
	                <td>ID</td>
	                <td>所属分类</td>	           
	                <td>审核状态</td>
	                <td>回复状态</td>
	                <td>显示姓名</td>
	                <td>提交时间</td> 
	                <td>IP地址</td>
	                <td>操作</td>
	              </tr>
	             
				 <?php
				 if($infocount>=1){				 
				 foreach($result as $row){				 
				 ?>
	       <tr style="background:#F2F2F2 ;">
	            <td>
	          		<input type="checkbox" name="id[]" id="id"  value="<?php echo $row["id"];?>"/>
	            </td>
			    <td><?php echo $row["id"];?></td>
			    <td><?php echo $row["typename"];?></td>
	            <td>
	                <?php
	                if($row["issh"]==1)
	                {echo "已审核";}	                                    
	                else {	               
	                    echo "<span style='color:red;font-weight:bold'>待审核</span>";
	                }
	                ?>
	            </td>
	       		<td>
	           <?php
	           if($row["ishf"]==1){	           
	               echo "已回复";
	           }else{  
	                echo "<span style='color:red;font-weight:bold'>待回复</span>";
	           }
	           ?>
	      	</td>
	   		<td><?php echo $row["usernameshow"];?></td>
	        <td><?php echo date("y-m-d h:i",$row["addtime"]);?></td>
	    
		    <td><?php echo $row["ip"];?></td>
		    <td>
		    	<a href="feedback_del.php?id=<?php echo $row["id"];?>">删除</a>
		        <a href='feedback_edit.php?id=<?php echo $row["id"];?>'>修改</a>
		    </td>
	    </tr>  
	       <?php
		    }}else{
			  echo "<tr><td colspan=10><div style='line-height:25px;font-weight:bold;text-align:center;color:red;'>暂无数据</div></td></tr>";
		    }
	        ?>
	    <tr>
	    	<td colspan="10">
	            <input name="" type="submit" value="批量删除"/>
	            <input type="button" name="button" id="button" value="设置审核" onclick="goupdate('issh',1);" />
	            <input type="button" name="button" id="button" value="设置回复" onclick="goupdate('ishf',1);" />
	            <input type="button" name="button" id="button" value="取消审核" onclick="goupdate('issh',0);" />
	            <input type="button" name="button" id="button" value="取消回复" onclick="goupdate('ishf',0);" />
	            <input type="hidden" name="ziduan" id="ziduan" />
	            <label for="zt"></label>
	            <input type="hidden" name="zt" id="zt" /></td></tr>
	         </table>
	        </form>
	       </td>
	    </tr>

	   </table>
	         
	    <div id="page" style="width: 100%;text-align: center;">	                    
	             <?php echo $page->show(1);?>	            
	        </div>
	    <div>
	        <form action="" method="get" name="sousuo">
	                      搜索：  <input name="key" type="text" />
	            <input name="" type="submit" value="搜索" />
	        </form>
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
 