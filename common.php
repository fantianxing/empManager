<?php
/*
 * Created on 2016-2-19
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 function getLastTime(){
	 	 if (!empty($_COOKIE['lastVisit'])) {
		echo "你上次登陆的时间是:".$_COOKIE['lastVisit'];
	}else{
		echo "你是第一次登陆";
	}
		setCookie("lastVisit",date("Y-m-d : H:i:s"),time()+24*3600*30);
 }
 
 function getCookieValue($key){
 	if(!empty($_COOKIE[$key]))
 	{
 	 return $_COOKIE[$key];
 	}else{
 		return "";
 	}
 }
 
	function checkUserValidate(){
		session_start();
		 if ( empty($_SESSION['loginuser']) ) {
	
		header("Location:login.php?erron=1");

		}
	
	}
	
	function checkErron($id){
	
		switch ( $id ) {
		case 1:
			echo "<font color='red'>用户id或者密码错误<font>";
			break;
			
		case 2:
			echo "<font color='red'>用户id为空<font>";
			break;
		case 3:
			echo "<font color='red'>密码为空<font>";
			break;
				
		case 3:
			echo "<font color='red'>验证码错误<font>";
			break;
			
		default:
			break;
		}
	}
 
?>
