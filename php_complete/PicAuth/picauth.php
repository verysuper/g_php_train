<?
//產生新4個長度的整數驗證碼
session_start();//啟動 session
$number = '';
$number_len = 4;
$stuff = '012345678901234567890123456789012345678901234567890123456789';
$stuff_len = strlen($stuff) - 1;
for ($i = 0; $i < $number_len; $i++) {
	$number .= substr($stuff, mt_rand(0, $stuff_len), 1);
}

//產生session變數
$_SESSION['imgcode']=$number;

//產生驗證碼圖片
srand((double)microtime()*1000000);
$im = imagecreate(90,32);
$black = imagecolorallocate($im, 0x66, 0x66, 0x66);
$white = imagecolorallocate($im, 0xff, 0xff, 0xff);

//載入字體
$font = imageloadfont('./gjun.gdf');
//將4位元整數驗證碼繪入圖片
imagestring($im, $font, 5, 2, $number, $white);

// 輸出圖片
header("Content-type: image/png");
imagepng($im);
imagedestroy($im);
?>