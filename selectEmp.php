<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<img src="./image/aaa.png"/>

<?php
	require_once 'common.php';
	checkUserValidate();

?>

<hr/><!--横线-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>查询界面</title>
</head>

<body>

<?php
/*
 * Created on 2016-2-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 //显示所有用户的信息
 require_once 'FenyePage.class.php';
 require_once 'EmpService.class.php';

  header("content-type: text/html;charset=utf-8");
  $empService=new EmpService();
  $fenyePage =new FenyePage();
  if ( !empty($_POST['keyWord'])) {
			$fenyePage->keyWord=$_POST['keyWord'];
			 setCookie("keyWord","",time()-200);
			 setCookie("keyWord",$fenyePage->keyWord,time()+3600*7);
			
		}
		if ( !empty($_POST['group'])) {
			 
			$_SESSION['group']=$_POST['group'];
			
		}
		
		
?>

<h1>查询界面</h1>
<form action="selectEmp.php" method="post">
<table>
	<tr>
		<td>请输入关键字：<input type="text" class="text" name="keyWord" style="width:180px;height:20px"
		value="<?php echo $fenyePage->keyWord;?>"/> 
			<input type="submit" class="submit button" value="查询" />
		</td>

	</tr>
	<tr>
		<td>精确查询：<input type="radio"  name="group"  value="accurate" checked  />
		模糊查询：<input type="radio"  name= "group" value="vague"  
		<?php 
			if(!empty( $_POST['group'])){
				if($_POST['group']=="vague") {
					echo "checked";
				}
			}?> 
			/>
		</td>
	</tr>

</table>

</form>

<?php

//********分页*******
 	
	
	$fenyePage->pageSize =10;
	$fenyePage->gotoUrl="selectEmp.php";
	$fenyePage->pageNow=1;//显示第几页，这是一个变量(用户指定)
	
//	$fenyePage->pageCount=ceil($fenyePage->rowCount/$fenyePage->pageSize);

	//我们需要用户的点击来修改$pageNow
		
		if(!empty($_GET['pageNow'])){
			$fenyePage->pageNow=$_GET['pageNow'];
		}
		
		
	
	if(!empty( $_SESSION['group'])){
			if ( $_SESSION['group']=="accurate" ) {
				$empService->getSelectFenyePage($fenyePage);
			
			}elseif ( $_SESSION['group']=="vague" ) {
				$empService->getVagueSelectFenyePage($fenyePage);
			}
	}

		
		echo "<table border='1px' width =700px bordercolor='green' cellspacing ='0px'>";
		echo "<tr><th>id</th><th>name</th><th>grade</th>" .
				"<th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
		 for ( $i = 0; $i < count($fenyePage->res_array); $i++ ) {
			$row=$fenyePage->res_array[$i];
			echo "<tr><td>{$row['id']}</td><td>{$row['name']}" .
		 			"</td><td>{$row['grade']}</td><td>{$row['email']}" .
		 			"</td><td>{$row['salary']}</td><td><a onclick = 'return confirmDele({$row['id']})' href= 'empProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='empUpdate.php?id={$row['id']}'>修改用户</a></td></tr>";
		}
		echo "<h1>查询结果</h1>";
		echo "</table>";
		echo "$fenyePage->navigation";
	?>

</body>
</html>