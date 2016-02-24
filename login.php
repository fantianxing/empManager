<?php
require_once 'common.php';

?>

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
<body>
<center>
<h1>管理员登陆</h1>
<form action="loginProcess.php" method="post">
<table>
	<tr>
		<td>用户id：</td>
		<td><input type="text" class="text" name="id" value="<?php echo getCookieValue('id'); ?>" style="width:180px;height:20px" /></td>

	</tr>
	<tr>
		<td>密 &nbsp; &nbsp;码：</td>
		<td><input type="password" class="text" name="password"  style="width:180px;height:20px" /></td>

	</tr>
	
	<tr>
	
	
		<td>验证码：</td>
		<td style="text-align: center;"><input type="text" name="checkCode"  style="width:180px;height:20px" />
		
		<img src="code.php" onclick ="this.src='code.php?aa='+Math.random()"/>
		</td>

	</tr>
	
	
	<tr>
		<td colspan ="2">是否保存用户id<input type="checkbox"  name="keep" /></td>
		
	</tr>
	
	<tr>
		<td><input type="submit" class="submit button"  value="用户登陆" /></td>
		<td><input type="reset" class="reset button"    value="重新填写" /></td>

	</tr>

</table>

</form>
<center/>
<?php
/*
 * Created on 2016-2-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 //登陆界面
 //********************该版本完成了分层模式的分页功能 ，并且把分布的信息封装到FenyePage中去
 //********************从而提高代码的复用性
	 require_once 'common.php';
	
	 if (!empty($_GET['erron'])){
		$id=$_GET['erron'];
		 checkErron($id);
	}
?>
</body>
</html>


