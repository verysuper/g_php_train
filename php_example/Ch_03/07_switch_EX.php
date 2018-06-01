<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>switch敘述</title>
</head>

<?php
	$score = 65;  				//存放分數
	$level = $score / 10; 	//計算等級
	
	switch((int)$level){		//轉換成整數
	  case 10:
	  case 9:
		echo "等級A+<br/>";
		break;
	  case 8:
		echo "等級A<br/>";
		break;
	  case 7:
		echo "等級B<br/>";
		break;
	  case 6:
		echo "等級C<br/>";
		break;
	  default:
		echo "等級Fail<br/>";
	}
?>

<body>
</body>
</html>