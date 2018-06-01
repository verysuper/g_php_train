<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>while迴圈範例</title>
</head>

<?php
	$money = 230; //代表目前的金額
	$i=0;
	echo "1. 打開冰箱<br/>";
	echo "2. 拿出一瓶可樂<br/>";
	echo "3. 倒一杯可樂<br/>";
	
	while($money >= 20){
		echo "4. 喝 $i 杯可樂<br/>";
			$money -= 20;
			$i++;
	}
	echo "剩".$money;
?>

<body>
</body>
</html>