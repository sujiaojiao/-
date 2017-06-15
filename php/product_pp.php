<!--商品管理/商品品牌-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/page.class.php';
//	
//	
	$db= new DbMysql();
	$sql="select * from productpp ";
	$parm=" where 1 ";  //基本条件语句
//	
	$recommend=@$_GET["recommend"];
//	
	if($recommend!="")
	{
	    $parm.=" and recommend='$recommend' ";
	}
	
	$sql.=$parm;
	$sql.=" order by pporder ";
	$db->sql($sql);
	$infocount=$db->affected();  //信息总数量
	$pagesize=10; //每页数量
	
	 
	
	$page= new page($infocount, $pagesize);
	
	
	
	echo $sql;
	$sql.=$page->limit();
	$result=$db->select($sql);

 
 
?>
<!DOCTYPE html>
<html>
	<head>
	<meta  charset="utf-8" />
	<title>商品品牌</title>
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
		        <td height="31"><div>商品品牌</div></td>
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
	            <td class="bgtext">当前位置：商品品牌列表</td>
	          </tr>
	          <tr>
	            <td height="20">
	            	<table width="100%" height="1">
		              <tr>
		                <td><div ><A href='product_PPadd.php'>
		                	<img src="../images/add.gif" width="16" height="16" /> 添加新品牌</a>
		                    </div>
		                </td>
		              </tr>
		            </table>
		        </td>
	          </tr>
	          <tr>
	            <td>
	                <div style="line-height:25px;font-size:12px;">
	                                                查看：<a href="product_pp.php">全部</a> 
	                    <a href="?recommend=1">推荐</a>
	                    <a href="?recommend=2">不推荐</a>     	                   
	                </div>
	                <table width="100%" height="31">
	              <tr class="fonbac">
	              	<td width="30" ></td>
	                <td >排序</td>
	                <td >品牌名称</td>
	                <td >品牌LOGO</td>
	                <td >是否推荐</td>	                
	                <td >操作</td>
	              </tr>
	                  <?php
	                  foreach($result as $row)
	                  {
	                  ?>
	              <tr style="background:#F2F2F2;">
	             	<td width="30" class="left_txt2"></td>
	                <td class="left_txt2"><?php echo $row["pporder"]?></td>

	                <td class="left_txt2"><?php echo $row["ppname"];?></td>
	                <td class="left_txt2"><img src="<?php echo $row["picurl"];?>" width="100" height="50"></td>
	                <td class="left_txt2">
	                    <?php
	                    if($row["recommend"]==1)
	                    {
	                        echo "<span style='color:red;font-weight:bold'>推荐</span>";
	                    }
	                    else
	                    {
	                        echo "不推荐";
	                    }
	                    ?>
	                </td>
	              
	                <td><a href="product_ppDel.php?id=<?php echo $row["id"];?>">删除</a>
	                    <a href="product_ppEdit.php?id=<?php echo $row["id"];?>">修改</a>	                    	
	                 </td>
	              </tr>
	               <?php
	                  }
	               ?>
	            </table></td>
	          </tr>
	 
	        </table>
				<div id="page" style="width: 100%;text-align: center;"> <?php
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
