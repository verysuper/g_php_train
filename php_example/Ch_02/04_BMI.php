<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>算數運算(BMI)</title>
</head>
<body>
<?php
	$name 	= "王小明"; 	//姓名(字串 string)
	$age  	= 11 ; 			//年齡(整數 integer)
	$height = 150.56; 		//身高(浮點數 float)
	$weight = 36.9;			//體重(浮點數 float)
	define(sex,"男");			//常數宣告(常數名稱,內容)
	
	$BMI	= $weight / (($height/100)*($height/100));	//BMI = 體重 (kg) / 身高平方 (m2)
	
	echo "姓名: $name<br/>";
	echo "年齡: $age<br/>";
	echo "身高: $height<br/>";
	echo "體重: $weight<br/>";
	echo "性別: ".sex."<br/>";		//讀取常數內容(請參考後面字串串接)
	
	echo "BMI: $BMI<br/>";
?>
</body>
</html>