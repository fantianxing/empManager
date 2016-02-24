<?php

require 'SqlHelper.class.php';
class EmpService {

    function EmpService() {
    }
    //查询有多少页
    function getPageCount($pageSize) {
    	//需要查询的$rowCount
	$sql="select count(id) from emp";
	$sqlHelper=new SqlHelper();
	$res=$sqlHelper->execute_dql($sql);
	if($row=mysql_fetch_row($res)){
		$pageCount=ceil($row[0]/$pageSize);
		}
		mysql_free_result($res);
		$sqlHelper->close_connect();
		return $pageCount;
	}
	
	//获得当前记住记住雇员的信息
	
	public function getEmpListByPage($pageNow,$pageSize){
		$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";//0表示从第一条取
		$sqlHelper=new SqlHelper();
		//res是一个二维数组
		$res=$sqlHelper->execute_dql2($sql);
		
		$sqlHelper->close_connect();
		return $res;
		
	}
	
	function getFenyePage($fenyePage){
		$sqlHelper =new SqlHelper();
		$sql1="select * from emp" .
				" limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.
				",".$fenyePage->pageSize;
				
		$sql2="select count(id) from emp";
		$sqlHelper->execute_dql_fenye($sql1,$sql2,$fenyePage);
		$sqlHelper->close_connect();
	}
	
	//根据输入的id删除记录
		function delEmpId($id){
			$sql="delete from emp where id=$id";
			$sqlHelper= new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			return $res;
			$sqlHelper->close_connect();
			
		}
		
	//添加数据
	function addEmpId($name,$grade,$email,$salary){
		$sql="insert into emp(name,grade,email, salary ) values('$name','$grade','$email',$salary); ";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dml($sql);
		return $res;
		$sqlHelper->close_connect();
			
	}
	
	
	//获取一个雇员的信息
		function getEmpById($id){
			$sql="select *from emp where id=$id";
			$sqlHelper=new SqlHelper();
			$arr=$sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
			return $arr;
			
		}
	
	
	//修改雇员信息
	function updateEmpById($id,$name,$grade,$email,$salary){
		$sql="update emp set name='$name', grade='$grade',email='$email',salary='$salary' where id=$id;";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dml($sql);
		return $res;
	}
	
//	//精确查询
//	function getAccutateResult($keyWord){
//		$sql= "select * from emp  where salary=".($fenyePage->keyWord)." or id= ".($fenyePage->keyWord)." or  name= ".($fenyePage->keyWord)." or email= ".($fenyePage->keyWord)." or  grade= ".($fenyePage->keyWord)." limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize." , ".$fenyePage->pageSize;
//		$sqlHelper = new SqlHelper();
//		$arr=$sqlHelper->execute_dql2($sql);
//		return $arr;
//	}
//		
//		//模糊查询
//	function getVagueResult($keyWord){
//		$sql="select * from emp where salary like '%".$keyWord."%'";
//		$sqlHelper = new SqlHelper();
//		$arr=$sqlHelper->execute_dql2($sql);
//		return $arr;
//	}
	
	function getSelectFenyePage($fenyePage){
		$sqlHelper =new SqlHelper();
		$sql1="select * from emp  where salary='".($fenyePage->keyWord)."' or id= '".($fenyePage->keyWord)."' or  name= '".($fenyePage->keyWord)."' or email= '".($fenyePage->keyWord)."' or  grade= '".($fenyePage->keyWord)."' limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize." , ".$fenyePage->pageSize;
	
		$sql2="select count(id) from emp where salary= '".($fenyePage->keyWord)."' or id= '".($fenyePage->keyWord) ."' or name= '".($fenyePage->keyWord)."' or email= '".($fenyePage->keyWord)."' or grade= '".($fenyePage->keyWord)."'";

		$arr=$sqlHelper->execute_dql_fenye($sql1,$sql2,$fenyePage);
		if (  $arr==null&&!empty($fenyePage->keyWord)) {
			$fenyePage->navigation=  "<h2>未找到任何结果！</h2>";
		}
		$sqlHelper->close_connect();	
	}
	
	function getVagueSelectFenyePage($fenyePage){
		$sqlHelper =new SqlHelper();
		$sql1="select * from emp where salary like '%".($fenyePage->keyWord)."%'"."or id like '%".($fenyePage->keyWord)."%'"."or name like '%".($fenyePage->keyWord)."%'"."or email like '%".($fenyePage->keyWord)."%'"."or grade like '%".($fenyePage->keyWord)."%'"." limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize." , ".$fenyePage->pageSize;
		
		$sql2="select count(id) from emp where salary like '%".($fenyePage->keyWord)."%'"."or id like '%".($fenyePage->keyWord)."%'"."or name like '%".($fenyePage->keyWord)."%'"."or email like '%".($fenyePage->keyWord)."%'"."or grade like '%".($fenyePage->keyWord)."%'";
		
		$arr=$sqlHelper->execute_dql_fenye($sql1,$sql2,$fenyePage);

	
		if ( $arr==null &&!empty($fenyePage->keyWord)) {
			$fenyePage->navigation=  "<h2>未找到任何结果！</h2>";
		}
		$arr=$sqlHelper->close_connect();
	}
	
	
}
?>