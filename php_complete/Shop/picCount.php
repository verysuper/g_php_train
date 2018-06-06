<?
//產生圖片
require_once("mysqlCounter.php");
//格式化輸出、不足位數補0
$number = sprintf("%07d",sqlCounter(1));
srand((double)microtime()*1000000);
$im = imagecreate(77,20);
$back = imagecolorallocate($im, 0xee, 0xee, 0xee);
$fore = imagecolorallocate($im, 0x66, 0x66, 0x66);

//將7位整數繪入圖片
imagestring($im, 5, 5, 2, $number, $fore);

// 輸出圖片
header("Content-type: image/PNG");
imagepng($im);
imagedestroy($im);
?>