<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>接收多參數不回傳值</title>
</head>

<?php
	compute(5,15); //呼叫函數,傳遞2個整數參數5以及15 
	
	function compute($start,$max){
		$sum = 0;
		for($i=$start; $i<=$max; $i++){
		  $sum += $i;
		}
		echo "<B>$start+".($start+1)."+".($start+2)."...+$max= $sum</B><br/>";
	}
?>

<body>
</body>
</html>