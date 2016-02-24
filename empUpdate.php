
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>修改用户</title>
</head>
<?php
/*
 * Created on 2016-2-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 //修改用户信息
 require 'EmpService.class.php';
	 $id=$_REQUEST['id'];
	 $empService=new EmpService();
	 $arr=$empService->getEmpById($id);

 
?>

<img src="./image/aaa.png"/>
<hr/><!--横线-->
<h1>修改雇员</h1>
<form action="empProcess.php" method="post">

<table>


	<tr>
		<td>id号</td>
		<td><input readonly type="text" name="id" value=<?php echo $arr[0]['id']?> /></td>

	</tr>
	
	<tr>
		<td>名字</td>
		<td><input  type="text" name="name" value=<?php echo $arr[0]['name']?> /></td>

	</tr>
	<tr>
		<td>级别</td>
		<td><input type="text" name="grade" value=<?php echo $arr[0]['grade']?> /></td>
	</tr>
	<tr>
		<td>电邮</td>
		<td><input type="text" name="email" value=<?php echo $arr[0]['email']?> /></td>
	</tr>
	<tr>
		<td>薪水</td>
		<td><input type="text" name="salary" value=<?php echo $arr[0]['salary']?>  /></td>
	</tr>
	<tr>
		<td><input  type="submit" value ="修改用户"></td>
		<td><input type="reset" name="重新输入" /></td>
	</tr>
	<input type="hidden" name ="flag" value="updateemp"/><!--通过隐藏域来传送表单-->
	
</table>
</form>