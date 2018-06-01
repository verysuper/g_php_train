<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>do...while條件迴圈介紹</title>
</head>

<?php
	$round=1;
	
	do{
		echo "小明正在跑第 $round 圈(do ... while)<br/>";
		$round++;
	}while($round<=6);
?>

<body>
</body>
</html>