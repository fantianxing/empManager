<?php
/*
 * Created on 2016-2-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 //完成对数据的操作
	 class SqlHelper{
	 
		private $conn;
		private $host;
		private $user;
		private $password;
		private $db;
		private $arr;
	
	function SqlHelper(){
		$arr=parse_ini_file("db.ini");
		
		$this->conn=mysql_connect($arr['host'],$arr['user'],$arr['password']);
		
		if(!$this->conn){
			die("连接失败".mysql_error());
		}
			mysql_select_db($arr['db'],$this->conn);
			mysql_query("set names utf8");
		}

	 public function execute_dql($sql){
	
		$res=mysql_query($sql,$this->conn) or die(mysql_error());
		return $res;
	
	}
		//执行dql语句，返回一个数组
	
	public function execute_dql2($sql){
			
	
		$arr=array();
		$res=mysql_query($sql,$this->conn) or die(mysql_error());
		$i=0;
		while ( $row=mysql_fetch_assoc($res) ) {
			$arr[$i++]=$row;
		}
		mysql_free_result($res);
		return $arr;
	}
	
	//考虑分页情况的查询
	public function execute_dql_fenye($sql1,$sql2,$fenyePage){
		
		$res=mysql_query($sql1,$this->conn) or die(mysql_error());
		$arr=array();
		
		while ( $row=mysql_fetch_assoc($res) ) {
				$arr[]=$row;
		}
		
		mysql_free_result($res);
		$res2=mysql_query($sql2,$this->conn) or die(mysql_error());
		if( $row=mysql_fetch_row($res2)){
	
			$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
			$fenyePage->rowCount=$row[0];
		}
		
		mysql_free_result($res2);
		//把导航信息封闭到fenyePage中
		
		$fenyePage->res_array=$arr;
		
		$this->getNavigation($fenyePage);
		return $arr;
	}
	 public function execute_dml($sql){
		$bool=mysql_query($sql,$this->conn)or die(mysql_error());
		if(!$bool){
			return 0;//失败
		}else{
			if(mysql_affected_rows($this->conn)>0){
				return 1;//成功
			}else{
				return 2;//行数未受到影响
			}
		}
	}

	
	function getNavigation($fenyePage){
		//显示上一页和下一页
		$navigation="";
		$navigation.="<a href='{$fenyePage->gotoUrl}?pageNow='1'>首页</a>&nbsp;";
		if ( $fenyePage->pageNow>1) {
		
			$prePage=$fenyePage->pageNow-1;
			$navigation= "<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp;";
			
		}
		
		if ( $fenyePage->pageNow<$fenyePage->pageCount ) {
			$nextPage=$fenyePage->pageNow+1;
			$navigation.= "<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页</a>&nbsp;";
		}
		
	//用for打印超链接
	//显示10页
	$page_whole=10;
	$start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
	$index=$start;
	//定$start
	
	//一次性向前翻10页
		
		$navigation.= "<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'><<</a>&nbsp;";

		for(;$start<$index+$page_whole;$start++){
			$navigation.=  "<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>&nbsp;";
		}
		
		//一次性向后翻10页
		$navigation.= "<a href='{$fenyePage->gotoUrl}?pageNow=$start'>>></a>&nbsp;";
		//显示末页
		$navigation.= "<a href='{$fenyePage->gotoUrl}?pageNow=$fenyePage->pageCount'>末页</a>&nbsp;";
		//显示当前页，共有多少页
		
		$navigation.= "当前{$fenyePage->pageNow}页/共{$fenyePage->pageCount}页";
		//跳转到某页
		$navigation.= "<br/><br/>";
		
		
		$fenyePage->navigation=$navigation;
	
	}
		
	
   //关闭数据库连接的方法
   
   public function close_connect(){
   	if(!empty($this->conn)){
   		mysql_close($this->conn);
   	}
   }
}
?>
