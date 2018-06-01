<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>選擇性參數</title>
</head>

<?php
	compute(1,15); //呼叫函數,傳遞2個整數參數1以及15
	compute(1); //呼叫函數,只傳遞1個整數參數1 
	
	function compute($start,$max=20){
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