<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>結果是...</title>
</head>

<body>
<?php
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	
	$height = pow(($height/100),2);  //計算N次方
	$BMI=$weight/$height;
	
	echo "BMI：".$BMI."～";
	if($BMI<18.5){
		echo "體重過輕";
	}elseif($BMI<24){
		echo "正常範圍";
	}elseif($BMI<27){
		echo "異常範圍";
	}elseif($BMI<30){
		echo "輕度肥胖";
	}elseif($BMI<35){
		echo "中度肥胖";
	}elseif($BMI>=35){
		echo "重度肥胖";
	}
?>
</body>
</html>