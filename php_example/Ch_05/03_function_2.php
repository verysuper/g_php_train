<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>接收單一參數不回傳值</title>
</head>

<?php
	compute(15);//呼叫函數,傳遞1個整數參數15
	
	function compute($max){ //被呼叫者
		$sum = 0;
		for($i=1; $i<=$max; $i++){
		  $sum += $i;
		}
		echo "<B>1+2+3+...+$max= $sum</B><br/>";
	}
?>

<body>
</body>
</html>