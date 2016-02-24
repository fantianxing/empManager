<?php
/*
 * Created on 2016-2-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
header("content-type: text/html;charset=utf-8");
require "AdminService.class.php";
 //用户id
 if(!empty($_POST['id'])){
 	$password=$_POST['id'];
 }else{
 	header("Location:login.php?erron=2");
	exit();
 }
 
  //看看验证码是否输入正确
 if(!empty($_POST['checkCode'])){
 	$checkCode=$_POST['checkCode'];
 	session_start();
 	if ($checkCode!=$_SESSION['myCheckCode'] ) {
 	header("Location:login.php?erron=4");
	exit();
	 }
 }
 

 
 
 
 $id=$_POST['id'];
 //用户密码
 if(!empty($_POST['password'])){
 	$password=$_POST['password'];
 }else{
 	header("Location:login.php?erron=3");
	exit();
 }
 

 
 
 
 //用户是否选择保存id
 if(empty($_POST['keep'])){
 	if(!empty($_COOKIE['id'])){
 		setCookie("id",$id,time()-100);
 	}
 }else{
 	setCookie("id",$id,time()+7*2*24*3600);
 }


// $conn=mysql_connect("127.0.0.1","root","fan1346258");
// if ( !$conn ) {
//	die("连接失败".mysql_errno());
//}
//mysql_query("set names utf8",$conn) or die (mysql_errno());
//
//mysql_select_db("empmanager",$conn) or die(mysql_errno());
//
//$sql="select password,name from admin where id = '$id' ";
//$res= mysql_query($sql,$conn);



//实例化AdminService
$adminService=new AdiminService();
if($name=$adminService->checkAdmin($id,$password)){
	
	//合法
	//使用session看能否登陆
	session_start();
	$_SESSION['loginuser']=$name;
		header("Location:empManager.php?name=$name");
		exit();
	
}else{
	//非法
	header("Location:login.php?erron=1");
	exit();
}
 
// if ($row =mysql_fetch_assoc($res)){
//		//取出密码
//		if ( $row['password']==md5($password) ) {
//					//取出用户名字
//					$name=$row['name'];
//				 	header("Location:empManager.php?name=$name");
//				 	exit();
//		}
// }
//	header("Location:login.php?errno=1");
//	exit();
//	
//	
//	mysql_free_result($res);
//	mysql_close($conn);

 
// if($id=="1"&&$password=="admin"){
// 	header("Location:empManager.php");
// 	exit();
// }else {
//	header("Location:login.php?erron=1");
//	exit();
//}
?>
