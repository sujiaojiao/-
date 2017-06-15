
<?php
	//查询方法的类
	class DbMysql{
		public  $conn;
	    function __construct() {
	        $this->conn = new mysqli("localhost","root","root","shop");
	        $this->conn->query("set names utf8");        
	    }
        
		//数据库操作封装
	    function select($sql,$fanhui=2)
	    {
	        $result=$this->conn->query($sql);
	        if($result)
	            {
	              $array = array();
	              if($fanhui==1)
	                  {
	                   $array=$result->fetch_array();
	                  }
	              else{
	              while($row=$result->fetch_array())
	                  {
	                    $array[]= $row; 
	                  }
	              }
	               return $array;  
	            }
	            else
	            {
	                return false;
	            }
	    }
    
	    function sql($sql)
	    {
	        return $this->conn->query($sql);
	    }
    
	    function affected()
	    {
	        return $this->conn->affected_rows;//影响返回的结果集
	    }
      
	}
	//时间戳格式转变标准地区
	date_default_timezone_set("PRC");
	?>