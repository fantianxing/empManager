<?php
header("Content-type: image/png");


	

 //创建图片，并氢随机数画上去
 
 
$img=imagecreatetruecolor(80,20);
//背景颜色默认为黑色
 //可以自定义颜色

//$bg = imagecolorallocate($img, 0,0,0);
//
//$color=imagecolorallocate($img,0,0,0);

 $bgcolor=imagecolorallocate($img,255,255,255);
 imagefill($img,0,0,$bgcolor);
 //创建新的颜色
 
 $white=imagecolorallocate($img,255,255,255);
 $blue=imagecolorallocate($img,0,0,255);
 $red=imagecolorallocate($img,255,0,0);
 $green=imagecolorallocate($img,0,255,0);
 
 $checkCode="";
 for($i=0;$i<4;$i++){
 	$checkCode.=dechex(rand(1,15));
 }
 
  //画出干扰线条
  for ( $i=0; $i<20; $i++ ) {
	
	imageline($img,rand(0,110),rand(0,30),rand(0,10),rand(0,50),imagecolorallocate($img,rand(0,255),rand(2,255),rand(0,255)));
}
//画出噪点
//把四个随机画上去


imagestring($img,rand(1,5),rand(1,50),rand(2,5),$checkCode,$blue);
//若要使用中文

//array imagefttext(string $font_file , string $text [ array $extrainfo])
//imagettfext($img,15,10,20,25 $white,"STCINWEI.TTF","北京你好");
//输出


imagepng($img);



 //将创建的随机验证码保存到session中去

 session_start();
 $_SESSION['myCheckCode']=$checkCode;
?>
