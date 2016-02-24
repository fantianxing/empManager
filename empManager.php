<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>title</title>
</head>
<img src="./image/aaa.png"/>
<?php
	require_once 'common.php';
	checkUserValidate();
	getLastTime();
?>
<hr/><!--横线-->
<?php
/*
 * Created on 2016-2-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
if ( !empty($_GET['name']) ) {
	 echo "欢迎".$_GET['name']."登陆成功";
}elseif ( !empty($_SESSION['loginuser']) ) {
	 echo "欢迎".$_SESSION['loginuser']."登陆成功";
}


 echo "<br/><a href=login.php> 重新登录</a> ";
 	//显示上次登陆时间
	
?>

<body>
<h1>主界面</h1>
<a href="empList.php">管理用户</a><br/>
<a href="addEmp.php">添加用户</a><br/>
<a href="selectEmp.php">查询用户</a><br/>
<a href="?">退出系统</a><br/>
</body>
</html>



