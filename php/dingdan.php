<!--售后商品评论-->
<?php
	require "../public/init.php";
//		if(!ISLOGIN)
//	{
//	    webAlter("请登陆", "../login.html");
//	}
//	if(empty($_SESSION["productCart"]))
//	{
//	     webAlter("请选购商品", "../index.php");
//	}
	$sql="select * from ordercart";
	$listInfo=$db->select($sql,1);
	$db->sql($sql);
	$infocount=$db->affected();
//	$pagesize=20;
//	$page = new page($infocount,$pagesize);
//	$sql.=$page->limit(); 
	$result=$db->select($sql);
//	var_dump($result);
//	$cart = new cart();
//	$cartList=$cart->cartInfo();
//	$orderID=  time().  rand(100, 999);
 
?>
<!DOCTYPE html >
<html>
	<head>
	<meta  charset="utf-8" />
	<title>订单管理</title>
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
	 function goinfo(ziduan,id) {
		 document.updateinfo.ziduan.value=ziduan;
		 document.updateinfo.zt.value=id;
		 document.updateinfo.action="assess_update.php";
		 document.updateinfo.submit();
	 }
	 
	 function test() {	
		 if(document.soinfo.key.value==''){		 
			 alert('请输入搜索的关键词');
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
		      <tr><td height="31"><div>订单管理</div></td></tr>	      
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
	        <tr><td class="bgtext">当前位置：订单列表</td> </tr>       
	        <tr>
	            <td height="20">
					<table width="100%" height="1">
		              <tr>
		                <td>
		                	<div>
		                		<!--<A href='assess_add.php'><img src="../images/add.gif" width="16" height="16" /> 添加评论</a>-->	           		
		                	</div>
		                </td>
		                <td width="150" align="right">
		                </td>
		              </tr>
		            </table>
		        </td>
	        </tr>
	        <tr>
	            <td>
	            	<!--<div style="line-height:25px;font-size:12px;">
	                                                             查看:<a href="assess.php">全部</a>
	                    <a href="?issh=0">待审核</a> 
	                    <a href="?issh=1">已审核</a> 
	                    <a href="?istop=0">待置顶</a> 
	                    <a href="?istop=1">已置顶</a> 
	                    <a href="?recommend=0">待推荐</a>
	                    <a href="?recommend=1">已推荐</a>
	                    <a href="?isadmin=ok">管理员</a>
	                </div>-->
	             <form action="assess_allDel.php" method="post" name="updateinfo">
	            <table width="100%" height="31">
	              <tr class="fonbac">
	                <!--<td> </td>-->
	                <td>ID</td>
	                <td>商品编号</td>
	                <td>收货人</td>
	                <td>收货地址</td>
	                <td>手机号</td> 
	                <td>用户名</td>
	                <td>邮编</td>
	               <td>操作</td>
	              </tr>
	             
			 <?php

			 if($infocount>=1){			 
			  foreach($result as $row) {
			
			 ?>
			 <tr style="background:#F2F2F2 ;">
	 
		     <td><?php echo $row["id"];?></td>
		     <td><?php echo $row["orderID"];?></td>
		     <td><?php echo $row["shren"];?></td>
		    
	<td><?php echo $row["shdizhi"];?></td>
	     <td><?php echo $row["mobile"];?></td>
	     <td><?php echo $row["username"];?></td>
	     <td><?php echo $row["youbian"];?></td>
	     <td><a href='assess_del.php?id=<?php echo $row["id"];?>'>删除</a> 
	     	<a href="assess_edit.php?id=<?php echo $row["id"];?>">修改</a>
	     </td>
	      </tr>   
		  <?php
		 }
		 }
		 else{
		     echo "<tr><td colspan='11'><div style='font-weight:bold;text-align:center;color:red'>暂无数据</div></td></tr>";
		 }
		  ?>
	      
	    
		      </table>
		   </form>
		   </td>
	    </tr>	  
	    </table>	         
	     <div id="page" style="width: 100%;text-align: center;">	                    
	          
	       </div>      
	    <!--<div>
	     <form action="" method="get" name="soinfo" onsubmit="return test();">
	               搜索：<select name="ziduan" id="ziduan">
	                 <option value="pid" selected="selected">商品ID</option>
	                 <option value="content">评论内容</option>
	                 <option value="usernameshow">提交人员</option>
	               </select>&nbsp;
	               
	               <input name="key" type="text" id="key" />
	            
	            <input type="submit" name="button7" id="button7" value="提交" />
	            </form>
	       </div>-->
	                  
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
 