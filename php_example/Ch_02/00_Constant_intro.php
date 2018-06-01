<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>何謂常數</title>
</head>
<body>
<?php
	/*	假設有一個盒子，一開始裝入了8顆草莓，但是之後就不可以再加入新的
	草莓，當然也不可以吃掉草莓。為什麼呢？答案很簡單，因為它是一種
	「樣品」，所以當樣品一但做好後就不可以再改了喔！*/
	
	define("strawberry",8);						 //宣告常數名稱strawberry,裝入數量8顆
	echo strawberry;								//輸出strawberry顆數
	echo "<br>";
	echo "strawberry = ".strawberry;		//輸出字串 及 strawberry顆數
	echo " 顆";
?>
</body>
</html>