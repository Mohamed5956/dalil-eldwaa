<?php
if($_GET['id']){
header('Content-Type: image/png');
$im    = imagecreatetruecolor(600, 500);
$white = imagecolorallocate($im, 13, 28, 110);
$black = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, 600, 600, $white);
//x1,y1,x2,y2,textbackground
$text = $_GET['id']."...";
//$font = "Arial.ttf";
$font = "/home/orop45g666vs/public_html/Tajawal-Regular.ttf";
imagettftext($im, 70, 0, 70, 220, $black,$font,$text);
// image, font-size,angel,x,y,textcolor,fontfile,text
echo imagepng($im);
}
//imagedestroy($im);
?>