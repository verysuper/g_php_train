<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>布林與浮點數轉換成整數</title>
</head>

<body>
<?php
	$a = true;  
	$b = (int) $a ;  // true 轉換成 1
	echo $b . "<br>" ;
	
	$a = false;  
	$b = (int) $a ;  // fasle 轉換成 0
	echo $b . "<br>" ;
	
	$a = 3.14;  
	$b = (int) $a ;  // 3.14 截成整數 3
	echo $b . "<br>" ;  
?>
</body>
</html>