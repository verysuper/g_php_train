<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>何謂變數</title>
</head>
<body>
<?php
	/*假設您把宣告後的變數想像成是獲得一個盒子，也就是當我們宣告了一
	變數後在記憶體上所分派的空間（位置），接著我們將10顆柳丁放到盒
	子當中，那麼此時的盒子裡面不就裝了10顆柳丁，接著過一會又再增加7
	顆柳丁到盒子當中，那麼盒子當的柳丁不是就會有17顆了，然後筆者從
	盒子裡拿出3顆柳丁吃掉，此時盒子中的柳丁不就只下10了呢？*/
	
	$orange = 10;						//在PHP中宣告一個變數名字叫做 Orange，裝入10顆柳丁
	$orange = $orange+7;			//加入7顆
	$orange = $orange-3;			//拿出3顆吃掉
	echo "Orange = 剩 $orange 顆柳丁";		//輸出orange剩下顆數
?>
</body>
</html>