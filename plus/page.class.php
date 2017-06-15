<?php
	
	class page{
		private $infoCount; //信息总数
		private $pagesize; //每页数量
		private $pagecount; //总页数
		private $currpage; //当前页码
		
	function __construct($ifcount,$pgsize,$pgcount=1,$cupage=1){
		$this->infoCount=$ifcount;
		$this->pagesize=$pgsize;
		$this->pagecount=ceil($this->infoCount/$this->pagesize);
		$this->currpage=min($this->pagecount,max((int)@$_GET["page"],1));
			
	}
	function hello(){			
		echo "信息总量";
		echo  $this->infoCount;
		echo "每页显示数据：";
		echo  $this->pagesize;
	}
		//页码分页,每页显示的条数
	function show($b){           
	    $s='';
	    for($i=1;$i<=$this->pagecount;$i++)
	    {
	        if($i==$this->currpage)
	        {
	            $s.="<span style='color:#ff0000;font-weight:bold;'>$i</span>&nbsp;" ;
	        }else
	        {
	            $s.="<a href='".$this->pagecurl()."$i'>$i</a>&nbsp;";
	        }
	    }        
        	return "页码: $s";
     	}
	 
	function limit(){       
        return "limit ".($this->currpage-1)*$this->pagesize.",".$this->pagesize;
    }
		
	function pagecurl(){//当前页面的URL地址
//			return $_GET["typeid"];
		$url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
        $request_arr=parse_url($url);
		if(isset($request_arr['query'])) {	      	           
		    parse_str($request_arr['query'], $arr);	  // echo "有参数";           	            
		    unset($arr['page']);//注销掉其中的某个值	            	        	             
		    $url=$request_arr['path']."?".http_build_query($arr)."&page="; //重新的把这个网址组合起来
		}
	    else{	         
	            // echo "没参数";
	             //咱们也要给一个网址组合起来
	     	$url=strstr($url, "?")?$url."page=":$url."?page=";
		}	         
	         return $url;  

    }
    
          function pageurl2($dq) //当前页面的URL地址
     {
         //return @$_GET["typeid"]; // 比较原始的方法。
         //return "article.php?typeid=";
     
         $url=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];
         $request_arr=parse_url($url);
         
         if(isset($request_arr['query']))
         {
            // echo "有参数";
            parse_str($request_arr['query'], $arr);
            
            //注销掉其中的某个值
            unset($arr['page']);
            unset($arr[$dq]);
            
            //重新的把这个网址组合起来
             
             $url=$request_arr['path']."?".http_build_query($arr)."&$dq=";
         }
         else
         {
            // echo "没参数";
             //咱们也要给一个网址组合起来
             $url=strstr($url, "?")?$url."$dq=":$url."?$dq=";
         }
         
         return $url;  

     }
		
}
	
	
	?>