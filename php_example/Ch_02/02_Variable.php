<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>宣告PHP變數</title>
</head>
<body>
<?php
	$name 	= "王小明"; 	//姓名(字串 string)
	$age  	= 11 ; 			//年齡(整數 integer)
	$height = 150.56;		 	//身高(浮點數 float)
	$weight = 36.9;			//體重(浮點數 float)
	$sex	= TRUE; 			//性別(邏輯 boolean)
	echo "姓名: $name<br/>";
	echo "年齡: $age<br/>";
	echo "身高: $height<br/>";
	echo "體重: $weight<br/>";
	echo "性別: $sex<br/>";
?>
</body>
</html>