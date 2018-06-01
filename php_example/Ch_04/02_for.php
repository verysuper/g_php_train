<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>for迴圈</title>
</head>

<?php
	echo "1. 打開冰箱<br/>";
	echo "2. 拿出一瓶可樂<br/>";
	echo "3. 倒一杯可樂<br/>";
	
	for($i=1; $i<=5; $i++){				//	for([初始值運算]; [條件]; [增/減值]){
		echo "4. 喝一口可樂<br/>";		//		連續動作;
	}												//	}
?>

<body>
</body>
</html>