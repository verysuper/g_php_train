<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
	$a = rand(5, 15);
	compute($a);//呼叫函數,傳遞1個整數參數15
	
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