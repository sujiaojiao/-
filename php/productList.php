<!--商品分类页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/ProductType.class.php';

	$select = new DbMysql();
	$result=$select->select("select * from productList");
	
?>
<!DOCTYPE html>
<html >
	<head>
		<meta  charset="utf-8" />
		<title>商品分类</title>
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
			.im{width: 100px; height:50px;}
		
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
	         <table width="98%" align="center">
	          <tr>
	            <td class="bgtext">当前位置：商品分类列表</td>
	          </tr>
	          <tr>
	            <td height="20">
	            	<table width="100%" height="1">
	              <tr>
	                <td>
	                	<div class="add">
	                		<A href='productList_add.php'>
	                			<img src="../images/add.gif" width="16" height="16" /> 添加新分类
	                		</a>	              		
	                	</div>
	                </td>
	                		
	              </tr>
	            </table></td>
	          </tr>
	          <tr>
	            <td>
	            <table width="100%">
	              <tr class="fonbac" style="font-weight: 600;">
	                <td width="42" style="padding: 5px 0px;">ID</td>
	                <td  style="padding: 5px 0px;">分类图标</td>	
	                <td  style="padding: 5px 0px;">分类名称</td>	                 	                 
	                <td  style="padding: 5px 0px;">操作</td>
	              </tr>
	             
	           
					 
	

 					<?php
	              	$ptype=new ProductType();
                    $menu = $ptype->infoList();
					
					foreach($menu as $row){
						
						@$menu.="<tr style='background:#F2F2F2';>";
				        @$menu.="<td>".$row["id"]."</td>";
						 @$menu.="<td>|". str_repeat("_", substr_count($row["idpath"], "_")*2).$row["typename"]."</td>";
				        @$menu.=" <td><img class='im' src=".$row['picurl']."></td>"; 
				        @$menu.="<td><a href='productList_del.php?id=".$row["id"]."'>删除</a> <a href='productList_edit.php?id=".$row["id"]."'>修改</a></td>";
				       @ $menu.="</tr>";
					}
		           echo $menu;
				  	
				   
	             ?>
	           
	              
	              
	            </table></td>
	          </tr>
	 
	        </table>
	        <div id="page"> </div>
	                 	                  
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


 