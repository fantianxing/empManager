<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>登录界面</title>
</head>
<img src="./image/aaa.png"/>
<hr/><!--横线-->
<h1>添加雇员</h1>
<form action="empProcess.php?flag=addemp" method="post">

<table>
	<tr>
		<td>名字</td>
		<td><input type="text" name="name" /></td>

	</tr>
	<tr>
		<td>级别</td>
		<td><input type="text" name="grade" /></td>
	</tr>
	<tr>
		<td>电邮</td>
		<td><input type="text" name="email" /></td>
	</tr>
	<tr>
		<td>薪水</td>
		<td><input type="text" name="salary" /></td>
	</tr>
	<tr>
		<td><input  type="submit" value ="添加用户"></td>
		<td><input type="reset" name="重新输入" /></td>
	</tr>
	<input type="hidden" name ="flag" value="addemp"/><!--通过隐藏域来传送表单-->
	
</table>

	
</form>
<?php
/*
 * Created on 2016-2-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 
?>
