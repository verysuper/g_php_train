<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>不接收參數不回傳值</title>
</head>

<?php
	compute();//呼叫函數一次
	compute();//呼叫函數一次
	compute();//呼叫函數一次
	
	function compute(){
		$sum = 0;
		for($i=1; $i<=10; $i++){
		  $sum += $i;
		}
		echo "sum= $sum<br/>";
	}
?>

<body>
</body>
</html>