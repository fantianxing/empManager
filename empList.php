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
	<title>雇员信息列表</title>
<script type="text/javascript" >
<!--
	function confirmDele(val){
		return	window.confirm("是否要删除id="+val+"的用户");
	}
//-->
</script>	
	
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
 require_once 'SqlHelper.class.php';
  header("content-type: text/html;charset=utf-8");
 
// $conn=mysql_connect("127.0.0.1","root","fan1346258");
// if ( !$conn ) {
//	die("连接失败".mysql_errno());
//}
//mysql_query("set names utf8",$conn) or die (mysql_errno());
//
//mysql_select_db("empmanager",$conn) or die(mysql_errno());



//********分页*******
$fenyePage =new FenyePage();
$empService=new EmpService();


$fenyePage->pageSize =10;

$fenyePage->gotoUrl="empList.php";
$fenyePage->pageNow=1;//显示第几页，这是一个变量(用户指定)



//我们需要用户的点击来修改$pageNow
if(!empty($_GET['pageNow'])){
	$fenyePage->pageNow=$_GET['pageNow'];
}



//$pageCount=0;//这个表示共有多少页，是计算出来的
//
//$sql="select count(id) from emp";
//$res1=mysql_query($sql);
//if ( $row=mysql_fetch_row($res1) ) {
//	$rowCount=$row[0];
//}
////计算出共有多少页
//
//$pageCount=ceil($rowCount/$pageSize);



$empService->getFenyePage($fenyePage);

//$pageCount=$empService->getPageCount($pageSize);


//$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";//0表示从第一条取
//$res2= mysql_query($sql,$conn);

//$res2=$empService->getEmpListByPage($pageNow,$pageSize);

echo "<table border='1px' width =700px bordercolor='green' cellspacing ='0px'>";
echo "<tr><th>id</th><th>name</th><th>grade</th>" .
		"<th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
//经结果集的 方式取数据，循环显示用户信息
/* while($row=mysql_fetch_assoc($res2)){
 	echo "<tr><td>{$row['id']}</td><td>{$row['name']}" .
 			"</td><td>{$row['grade']}</td><td>{$row['email']}" .
 			"</td><td>{$row['salary']}</td><td><a href=  ?>删除用户</a></td><td><a href=?>修改用户</a></td></tr>";
 }*/
 
 for ( $i = 0; $i < count($fenyePage->res_array); $i++ ) {
	$row=$fenyePage->res_array[$i];
	echo "<tr><td>{$row['id']}</td><td>{$row['name']}" .
 			"</td><td>{$row['grade']}</td><td>{$row['email']}" .
 			"</td><td>{$row['salary']}</td><td><a onclick = 'return confirmDele({$row['id']})' href= 'empProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='empUpdate.php?id={$row['id']}'>修改用户</a></td></tr>";
}

echo "<h1>雇员信息列表</h1>";
 
echo "</table>";
//显示出页码的超链接
//for($i=1;$i<=$pageCount;$i++){
// 	echo "<a href=empList.php?pageNow=$i>$i</a>&nbsp;";
// }
//显示首页
	


echo "$fenyePage->navigation";

	
//		if ( $fenyePage->pageNow>1) {
//			$prePage=$fenyePage->pageNow-1;
//			echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
//		}
//		echo $fenyePage->pageNow;
//		if ( $fenyePage->pageNow<$fenyePage->pageCount ) {
//			$nextPage=$fenyePage->pageNow+1;
//			echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
//		}
		
	
/*

	echo "<a href='empList.php?pageNow='1'>首页</a>&nbsp;";
	//用for打印超链接
	//显示10页
	$page_whole=20;
	$start=floor(($pageNow-1)/$page_whole)*$page_whole+1;
	$index=$start;
	//定$start
	
	//一次性向前翻10页
		echo "<a href='empList.php?pageNow=".($start-1)."'><<</a>&nbsp;";
	
//	if( $pageNow>10){
//		$prePage=$pageNow-10;
//		echo "<a href='empList.php?pageNow=$prePage'><<</a>&nbsp;";
//	}else{
//		echo "<a href='empList.php?pageNow='1'><<</a>&nbsp;";
//	}
	

	
	
	
	for(;$start<$index+$page_whole;$start++){
		echo "<a href='empList.php?pageNow=$start'>[$start]</a>&nbsp;";
	}
	
	
	
	//一次性向后翻10页
	echo "<a href='empList.php?pageNow=$start'>>></a>&nbsp;";

//	if( $pageNow<$pageCount-10){
//			$prePage=$pageNow+10;
//		echo "<a href='empList.php?pageNow=$prePage'>>></a>&nbsp;";
//	}else{
//		echo "<a href='empList.php?pageNow=$pageCount'>>></a>&nbsp;";
//	}
	




//显示末页
echo "<a href='empList.php?pageNow=$pageCount'>末页</a>&nbsp;";
//显示当前页，共有多少页
	
	echo "当前{$pageNow}页/共{$pageCount}页";
	//跳转到某页
	echo "<br/><br/>";
	*/
	?>
	
	<form action="empList.php">
	跳转到：<input type="text" class="text" name="pageNow" size="size" maxlength="size" />
	<input type="submit" class="submit button"  value="Go" />
	</form>


</body>
</html>