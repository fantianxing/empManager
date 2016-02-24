<?php
/*
 * Created on 2016-2-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 //接收用户要删除的操作
 
  require_once 'EmpService.class.php';
 $empService=new EmpService();

if(!empty($_REQUEST['flag'])){
		$flag=$_REQUEST['flag'];
		//若flag为del，则用户要求删除数据
		if($flag=="del"){
			$id=$_REQUEST['id'];
			 //接收删除的命令
			if($empService->delEmpId($id)==1){
				header("Location:ok.php");
			}else{
				header("Location:error.php");
			};
		}else if($flag=="addemp"){
			//用户希望添加数据
			$name=$_REQUEST['name'];
			$grade=$_REQUEST['grade'];
			$email=$_REQUEST['email'];
			$salary=$_REQUEST['salary'];
			$res=$empService->addEmpId($name,$grade,$email,$salary);
			if ( $res==1 ) {
				header("Location:ok.php");
				exit();
			}else{
				header("Location:error.php");
				exit();
			}
		}else if ( $flag=="updateemp" ) {
			$id=$_REQUEST['id'];
			$name=$_REQUEST['name'];
			$grade=$_REQUEST['grade'];
			$email=$_REQUEST['email'];
			$salary=$_REQUEST['salary'];
			$res=$empService->updateEmpById($id,$name,$grade,$email,$salary);
			if ( $res==1 ) {
				header("Location:ok.php");
				exit();
			}else{
				header("Location:error.php");
				exit();
			}
		
		}
		
	}
		
	

 
?>
