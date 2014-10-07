<?php
if(!isset($_SESSION))
	session_start();
header ("Content-type: image/jpeg");
$im = imagecreate (161, 47);
$white=imagecolorallocate($im, 244, 244, 245);
$black1=imagecolorallocate ($im, 88,88, 90);
$text=rand(11111,99999);
$_SESSION['capthaid']=$text;
$ugol=rand(-10,20);
$rast=rand(10,60);
$rast2=rand(30,40);
imagettftext ($im, 20, $ugol, $rast, $rast2, $black1, "/var/www/gkh/img/helvet.OTF",$text);
imagejpeg ($im);
imagedestroy ($im);
?>