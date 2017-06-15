<!--商品信息数据库封装-->
<?php
   class ProductType{
   		
	 private  $db;
	 //创建数据库连接
    function __construct() {
        $this->db= new DbMysql();
    }
    
	//商品列表显示
	function fl($tid){		
	    $result=$this->db->select("select * from productList where tid=$tid");
	    $menu="";
	    $leftStr="";
	    $sd="";
	    foreach($result as $row){  
	        for($i=2;$i<=$row["sd"];$i++) {      
	            $leftStr="|-";
	            $sd.="-";
	        }
	        $menu.="<tr class='left_txt2'>";
	        $menu.="<td bgcolor='#F2F2F2'>".$row["id"]."</td>";
	        $menu.="<td bgcolor='#F2F2F2'>".$leftStr.$sd.$row["typename"]."</td>";
	        $menu.="<td bgcolor='#F2F2F2'><a href='productList_del.php?id=".$row["id"]."'>删除</a> <a href='productList_edit.php?id=".$row["id"]."'>修改</a></td>";
	        $menu.="</tr>";
	       // $menu.="<option value='".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
	        $sd="";
	        $menu.=$this->fl($row["id"]);
	    }	    
	    return $menu;
  }
	
	//商品列表修改封装
	function floption($tid,$dqid=0,$style=0){  
	    $result=$this->db->select("select * from productList where tid=$tid");
	    $menu="";
	    $leftStr="";
	    $sd="";
	    foreach($result as $row){   
	        for($i=2;$i<=$row["sd"];$i++){       
	            $leftStr="|-";
	            $sd.="-";
	        }
	        if($style == 0){	        		        
		        if($dqid==$row["id"]){
		        	$menu.="<option value='".$row["id"]."' selected>".$leftStr.$sd.$row["typename"]."</option>";
		        }else {       
		       		$menu.="<option value='".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
		        }
	        }else{//网址地址
	        	if($dqid==$row["id"]){
		        	$menu.="<option value='?typeid=".$row["id"]."' selected>".$leftStr.$sd.$row["typename"]."</option>";
		        }else {       
		       		$menu.="<option value='?typeid=".$row["id"]."'>".$leftStr.$sd.$row["typename"]."</option>";
		        }
	        }
	        $sd="";
	        $menu.=$this->floption($row["id"],$dqid,$style);
	    }   
	    return $menu;
}

	//商品列表删除封装
	function typeDel($id){
	    $result=$this->db->select("select * from productList where tid=$id");
	    $xj=$this->db->affected();
	    $info="";
	    if($xj!=0){      
	        foreach($result as $row)
	        {
	            $info.=$this->typeDel($row["id"]);   
	        }
	        $this->db->sql("delete from productList where id=$id");
	        
	    }
	    else
	    {
	        $this->db->sql("delete from productList where id=$id");
	    }
	    return $info;   
	}
	
	//商品深度修改时更新
	function updateSd($id,$sd){
	    $result=$this->db->select("select * from productList where tid=$id");
	    $xj=$this->db->affected();
	    $info="";	    
	    if($xj!=0) {	   
	        $info.=$id."有下级,修正后的深度应该是:$sd<br>";
	        foreach($result as $row){	        	            
	            $info.=$this->updateSd($row["id"], $sd+1);
	        }
	        $this->db->sql("update productList set sd=$sd where id=$id");
	    }
	    else
	    {
	        $info.=$id."没有下级,修正后的深度应该是:$sd<br><br>";
	        $this->db->sql("update productList set sd=$sd where id=$id");
	    }
	    return $info;
	}
	
	function infoList(){
		$sql="SELECT concat( idpath, '_', id ) AS path, idpath,id, typename,picurl
FROM `productlist` order by path";
    return $this->db->select($sql);
	}
   }

?>