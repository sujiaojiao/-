<!--商品管理/商品管理页面-->
<?php
	 require_once "islogin.php";
	 require_once "../plus/DbMysql.php";
	 require_once "../plus/page.class.php";
	 require_once "../plus/productType.class.php";
	
	$rights = $_SESSION["rights"];  //当前管理员登录权限
	$username = $_SESSION["username"];
	
	
	$sql = "select product.*,productList.typename from product inner join productList on product.typeid=productList.id";
	$parm = " where 1";
	//判断过程
	//管理员身份
	if($rights != 1){
		$parm .= " and inputer ='$username'";
	}
	//判断查看的分类
	$typeid=@$_GET["typeid"];
	
	if($typeid != ""){
		$parm .= " and typeid=$typeid";
	}else{
		$typeid=0;
	}
	//判断关键词
	$key = @$_GET["key"];
	$ziduan=@$_GET["ziduan"];
	if($key != ""){
		$parm .= " and $ziduan like '%$key%'";
	}

	
	
	//判断热销
	$ishot = @$_GET["ishot"];
	if($ishot == 1){
//		echo "增加热销";
		$parm .= " and hot=1 ";
	}
	//判断推荐
	$isrecommend = @$_GET["isrecommend"];
	if($isrecommend == 1){
		$parm .= " and recommend=1 ";
	}
	//判断降价
	$isdrops = @$_GET["isdrops"];
	if($isdrops == 1){
		$parm .= " and drops=1 ";
	}
	
	$sql .= $parm;

	
	$db = new DbMysql();
	
	$db->sql($sql);
	$pagesize = 10;  //每页的数量
	$infocount = $db->affected();//信息总数量
	$page = new page($infocount,$pagesize);
	$sql .= " order by id desc ";
	$sql .= $page->limit();
		
	$result = $db->select($sql);
	?>
 
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>商品管理</title>
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
				font-weight: 600;
			}
		</style>
		<script>
			function test(){
				if(document.formsearch.key.value==""){
					alert("请输入查询的关键词");
					return false;
				}
			return true;
			}
			function goupdate(ziduan,zt){
//				alert(1);	
				document.info.ziduan.value=ziduan;
				document.info.zt.value=zt;
				document.info.action="ProductMng_update.php";
				document.info.submit();
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
		      <tr>
		        <td height="31"><div>商品管理</div></td>
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
	        <tr><td class="bgtext">当前位置：商品列表</td></tr>	            	        
	        <tr>
	            <td height="20">
	            	 <div style="font-size:12px;line-height:25px;">查看：
	            	 	<a href="ProductMng.php">全部</a> 
	            	 	<a href="?ishot=1">热销</a> 
	            	 	<a href="?isdrops=1">降价</a>
	            	 	<a href="?isrecommend=1">推荐</a>
	            	 </div>

		            <table width="100%" height="1" >
		              <tr>
		                <td>
		                	<div class="add"><A href='ProductMng_add.php'>
		                		<img src="../images/add.gif" width="16" height="16" /> 添加新商品</a>
		                	</div>
		                </td>
		                <td width="150" align="right"><label for="select"></label>
		                 
						<select name="select" id="select" onchange="javascript:location.href=this.options[selectedIndex].value" >
								<option value='ProductMng.php'>全部商品</option>	 
								<?php 
								 $ptype = new ProductType();
								 $menu = $ptype->floption(0,$typeid,1);	
								 echo $menu;
								?>
						</select>
		                
		                </td>
		              </tr>
		            </table>
	       		 </td>
	        </tr>
	        <tr>
	          <td>
	           <form action="ProductMng_alldel.php" method="post" name="info">
	            <table width="100%" height="31">
	                <tr class="fonbac">
		                <td ></td>
		                <td >ID</td>
		                <td >商品编号</td>
		                <td >商品名称</td>
		                <td >所属分类</td>
		                <td >商品属性</td>
		                <td >库存</td>
		                <td >浏览数</td>
		                <td >录入员</td> 
		                <td >上架时间</td>	                
		                <td >操作</td>
	       			</tr>	
	       			    <?php
	       			    if($infocount >= 1){	       			    		       			
	       			    	foreach($result as $row){	       			    	
	       			    	?>         	       
			        <tr class="left_txt2" style="background: #F2F2F2;">
				        <td><input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>"></td>  
				        <td><?php echo $row["id"]; ?></td>
				        <td><?php echo $row["numbers"]; ?></td>
				        <td><?php echo $row["title"]; ?></td> 
				        <td><?php echo $row["typename"]; ?></td> 
				        <td>
				        	<?php 
				        	  if($row["hot"]==1){
				        	  	echo "热销 ";
				        	  }
				        	  if($row["drops"]==1){
				        	  	echo "降价 ";
				        	  }
							  if($row["recommend"]==1){
				        	  	echo "推荐 ";
				        	  }						
							 ?>
				        	
				        </td> 
				        <td><?php echo $row["kucun"]; ?></td> 
				        <td><?php echo $row["hits"]; ?></td> 
				        <td><?php echo $row["inputer"]; ?></td> 
				        <td><?php echo date("Y-m-d H:i:s",$row["addtime"]); ?></td> 
				        <td><a href='ProductMng_del.php?id=<?php echo $row["id"]; ?>'>删除</a>
				            <a href='ProductMng_edit.php?id=<?php echo $row["id"]; ?>'>修改</a>
				            <a href="consult_add.php?pid=<?php echo $row["id"]; ?>">咨询</a>
				        </td> 
			        </tr>
	            <?php
					 }}
					else{
						echo "<tr><td colspan=8><div style='font-size:14px;color:#ff0000;with:100%;text-align:center;'>暂无数据</div></td></tr>";
					}
	            	?>
	            <tr>
	            	<td colspan="11">
	            		<input name="submit1" value="删除全选" type="submit" />
		                <input type="button" name="button" id="button" value="设置热销" onclick="goupdate('hot',1)" />
		                <input type="button" name="button2" id="button2" value="设置降价" onclick="goupdate('drops',1)"/>
		                <input type="button" name="button3" id="button3" value="设置推荐"  onclick="goupdate('recommend',1)"/>
		                <input type="button" name="button4" id="button4" value="取消热销" onclick="goupdate('hot',0)"/>
		                <input type="button" name="button5" id="button5" value="取消降价" onclick="goupdate('drops',0)"/>
						<input type="button" name="button6" id="button6" value="取消推荐" onclick="goupdate('recommend',0)"/>
                 		<label for="ziduan"></label>
                		<input type="hidden" name="ziduan" id="ziduan" />
                	 	<label for="zt"></label>
                 		<input type="hidden" name="zt" id="zt" />
                 	</td>
                </tr>
	            </table>
	           </form>
	          </td>
	        </tr>	 
	    </table>
	    <div id="page" style="width: 100%;text-align: center;">
	     <?php
	     	echo $page->show(1);
	     	?>
	    
	    </div>
	            
	           
	    
	    <div style="font-size:12px;">
	    	<form action="ProductMng.php" method="get"  id="formsearch" name="formsearch" onsubmit="return test();">
	                                商品关键字：
	          	<label for="ziduan"></label>
	            <select name="ziduan" id="ziduan">
	                <option value="numbers">商品编号</option>
	                <option value="title">商品名称</option>
	                <option value="inputer">录入员</option>
	            </select>
	            <input name="key" type="text" /> 
	            <input name="" type="submit" value="查询" />
	        </form>
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
 
