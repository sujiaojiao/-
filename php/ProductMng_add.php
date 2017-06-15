<!--商品管理/添加新商品页面-->
<?php
	require_once 'islogin.php';
	require_once '../plus/DbMysql.php';
	require_once '../plus/productType.class.php';
//	
	$ptype= new ProductType();
	$db = new DbMysql();
	$menu=$ptype->floption(0);
//	
	$_SESSION["file_info"] = array();
	$_SESSION["urlfile_info"]=array();  //保存图片的URL
	$_SESSION["fileid"]="";

    $productID = time();
	$productID .=rand(333,555)*1000;
	

//根据SWFUPload的思路，添加我们要得东西

?>
<!DOCTYPE html >
<html>
	<head>
		<meta  charset="utf-8" />
		<title>商品添加</title>

		<script type="text/javascript" src="../swfupload/swfupload.js"></script>
		<script type="text/javascript" src="../js/handlers.js"></script>
		<script src="../ckeditor/ckeditor.js"></script>
		<script src="../js/jquery-3.0.0.js"></script>
		<script type="text/javascript">
				var swfu;
				window.onload = function () {
					swfu = new SWFUpload({
						// Backend Settings
						upload_url: "upload.php",
						post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},
		
						// File Upload Settings
						file_size_limit : "2 MB",	// 2MB
						file_types : "*.jpg",
						file_types_description : "JPG Images",
						file_upload_limit : "0",
		
						// Event Handler Settings - these functions as defined in Handlers.js
						//  The handlers are not part of SWFUpload but are part of my website and control how
						//  my website reacts to the SWFUpload events.
						file_queue_error_handler : fileQueueError,
						file_dialog_complete_handler : fileDialogComplete,
						upload_progress_handler : uploadProgress,
						upload_error_handler : uploadError,
						upload_success_handler : uploadSuccess,
						upload_complete_handler : uploadComplete,
		
						// Button Settings
						button_image_url : "../images/SmallSpyGlassWithTransperancy_17x18.png",
						button_placeholder_id : "spanButtonPlaceholder",
						button_width: 180,
						button_height: 18,
						button_text : '<span class="button">Select Images <span class="buttonSmall">(2 MB Max)</span></span>',
						button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
						button_text_top_padding: 0,
						button_text_left_padding: 18,
						button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
						button_cursor: SWFUpload.CURSOR.HAND,
						
						// Flash Settings
						flash_url : "../swfupload/swfupload.swf",
		
						custom_settings : {
							upload_target : "divFileProgressContainer"
						},
						
						// Debug Settings
						debug: false
					});
				};
				function imgdel(pid){
					//移动thumbnails这个容器下面的
					//altok_pid
					//移除掉
					var ydiv = document.getElementById("altok"+pid);
					document.getElementById("thumbnails").removeChild(ydiv);
					//不光要移除视觉上的删除，还要删除session值以及服务器上的图片
					$.ajax({
						type:"post",
						url:"delimg.php?id="+pid
					});
				}
			</script>
		<style type="text/css">
			.imgshow{
				float: left;
				border: 1px solid #FF0000;
				margin-right: 10px;
				margin-bottom:  5px;
				padding: 5px;
			}
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
		</style>
		
		<script>
		function test()
		{
		  if(document.admin.numbers.value=='')
		  {
			  alert('商品编号不能为空');
			  return false;
		  }
		  if(document.admin.title.value=='')
		  {
			  alert('商品名字不能为空');
			  return false;
		  }
		  if(document.admin.typeid.value=='')
		  {
			  alert('商品所属分类不能为空');
			  return false;
		  }
		  if(document.admin.kucun.value=='')
		  {
			  alert('库存不能为空');
			  return false;
		   }
		   if(document.admin.hits.value=='')
		   {
			   alert('请填写默认的浏览数量');
			   return false;
			}
			if(document.admin.picurl.value=='')
			{
				alert('请为商品选择一张缩略图');
				return false;
			}
			if(CKEDITOR.instances.content.getData()=='')
			{
				alert('请填写商品介绍');
				return false;
			}
		return true;	
		}
		</script>
	</head>
<body>
<form name="admin" id="admin" method="POST" action="ProductMng_addSava.php" onsubmit="return test();">
<table width="100%">
	<tr>
	    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif">
	    	<img src="../images/left-top-right.gif" width="17" height="29" />
	    </td>
	    <td width="935" height="29" valign="top" background="../images/content-bg.gif">
	    	<table width="100%" height="31"  id="table2">
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
	          <tr><td class="bgtext">当前位置：添加新商品</td></tr>	            	          
	          <tr>
	            <td height="20">
	            	<table width="100%" height="1" bgcolor="#CCCCCC">
			            <tr>
			               <td></td>
			            </tr>
		            </table>
		        </td>
	          </tr>
	          <tr>
	            <td>
	            	<table width="100%" height="31">
			            <tr>
			               <td class="fonbac">&nbsp;&nbsp;&nbsp;&nbsp;商品基本信息</td>
			            </tr>
		            </table>
		        </td>
	          </tr>
	          <tr>
	            <td>
	            <table width="100%">
				
	              <tr style="background: #f2f2f2;">
	                <td width="10%" height="30" align="right">商品编号：</td>
	                <td width="1%" >&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="numbers" type="text" id="numbers" size="30" value="<?php 	echo $productID; ?>"/>
	                </td>
	                <td width="45%" height="30" class="bgtext">商品的编号,用于商品的管理，无商品编号系统会自动生成</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td width="10%" height="30" align="right" >商品名称：</td>
	                <td width="1%">&nbsp;</td>
	                <td width="32%" height="30" >
	                	<input name="title" type="text" id="title" size="30" />
	                </td>
	                <td width="45%" height="30"class="bgtext">商品的名称,用于前台展示使用</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right">商品品牌：</td>
	                <td bgcolor="#f2f2f2">&nbsp;</td>
	                <td width="32%" height="30" ><label for="typeid"></label>
	                  <select name="ppid" id="ppid">
	                  <option value="0">无品牌</option>
	                  <?php 
	                  	$result=$db->select("select * from productpp order by pporder");
						foreach($result as $row){
							echo "<option value='".$row["id"]."'>".$row["ppname"]."</option>";
						}
	                  	?>
	                  </select></td>
	                <td width="45%" height="30"  class="bgtext">所属品牌,用于根据品牌查看</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right">商品分类：</td>
	                <td bgcolor="#f2f2f2">&nbsp;</td>
	                <td width="32%" height="30" ><label for="typeid"></label>
	                  <select name="typeid" id="typeid">
	                  <option value="">请选择分类</option>
	                  <?php
	                  echo $menu;
	                  ?>
	                  </select></td>
	                <td width="45%" height="30"  class="bgtext">所属分类,用于商品归类</td>
	              </tr>
	                
	             <tr style="background: #f2f2f2;">
	                <td width="10%" height="30" align="right">商品属性：</td>
	                <td width="1%" >&nbsp;</td>
	                <td width="32%" height="30" >
	                	<input name="hot" type="checkbox" value="1">热销
	                   <input name="drop" type="checkbox" value="1">降价
	                   <input name="recommend" type="checkbox" value="1">推荐
	                </td>
	                <td width="45%" height="30" class="bgtext">商品的名称,用于前台展示使用</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right" >商品库存：</td>
	                <td>&nbsp;</td>
	                <td width="32%" height="30" >
	                	<input name="kucun" type="text" id="kucun" size="30" /></td>
	                <td width="45%" height="30"  class="bgtext">如果库存等于0时，则不能进行下单</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right" >浏览数量：</td>
	                <td >&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="hits" type="text" id="hits" value="0" size="30" />
	                </td>
	                <td width="45%" height="30" class="bgtext">可以初始化一个数量,用于展示该商品的浏览数</td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right" >原价：</td>
	                <td >&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="yprice" type="text" id="yprice" value="0" size="30" />
	                </td>
	                <td width="45%" height="30" class="bgtext"></td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td height="30" align="right" >现价：</td>
	                <td >&nbsp;</td>
	                <td width="32%" height="30">
	                	<input name="price" type="text" id="price" value="0" size="30" />
	                </td>
	                <td width="45%" height="30" class="bgtext"></td>
	              </tr>
	              <tr style="background: #f2f2f2;">
	                <td width="10%" height="30" align="right">缩略图：</td>
	                <td width="1%">&nbsp;</td>
	                <td width="32%" height="30">
	                	<input type="text" value="" id="picurl" style="width:280px;" name="picurl"/>
	                </td>
	                <td width="45%" height="30" class="bgtext">
	                	<iframe name="upfile" frameborder="0" width="300" height="25" src="uploadPic.php"></iframe>
	                </td>
	              </tr>
				  <tr style="background: #f2f2f2;">
					<td height="30" align="right">商品图集：</td>
					<td bgcolor="#f2f2f2">&nbsp;</td>
					<td width="32%" height="30" colspan="2" class="bgtext">
						<?php
						if( !function_exists("imagecopyresampled") ){
							?>
						<div class="message">
							<h4><strong>Error:</strong> </h4>
							<p>Application Demo requires GD Library to be installed on your system.</p>
							<p>Usually you only have to uncomment <code>;extension=php_gd2.dll</code> by removing the semicolon <code>extension=php_gd2.dll</code> and making sure your extension_dir is pointing in the right place. <code>extension_dir = "c:\php\extensions"</code> in your php.ini file. For further reading please consult the <a href="http://ca3.php.net/manual/en/image.setup.php">PHP manual</a></p>
						</div>
						<?php
						} else {
						?>
					 
							<div style="display: inline; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
								<span id="spanButtonPlaceholder"></span>
							</div>
					 
						<?php
						}
						?>
					   	<div id="divFileProgressContainer" style="height: 75px;"></div>
						<div id="thumbnails"></div>
					 </td>
              </tr>
              <tr style="background: #f2f2f2;">
                <td height="30" align="right" >商品介绍：</td>
                <td >&nbsp;</td>
                <td height="30" colspan="2" > 
                  <textarea name="content" id="content" cols="45" rows="5" class="ckeditor"></textarea>
                </td>
             </tr>
              <tr style="background: #f2f2f2;">
                <td height="30" colspan="4" align="center" >
                	<input type="submit" name="button" id="button" value="创建" /> &nbsp;
                  
                   <input type="reset" name="button2" id="button2" value="重置" />
                </td>
                </tr>
               
            </table>
           </td>
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
 </form>
</body>
</html>
