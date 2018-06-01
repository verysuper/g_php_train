<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>累加和</title>
</head>

<?php
	$sum = 0;
	
	for($count=1; $count<=100; $count++){
		if($count % 2 == 1){		//除以2餘數為1則為奇數
			$sum += $count;
		}
	}
	
	echo "1 ~ 100 間的奇數累加和為  $sum<br/>";
?>

<body>
</body>
</html>