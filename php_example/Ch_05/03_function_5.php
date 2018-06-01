<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搭配global</title>
</head>

<body>

<?php
	$sum=100;
	echo compute(1,15);		//呼叫函數,傳遞2個整數參數1以及15，並且接收回傳字串輸出
	
	function compute($start,$max){		
		global $sum;			//在函數中登記一個全域變數，名稱 $sum
		for($i=$start; $i<=$max; $i++){
		  $sum += $i;
		}
		return "<B>$start+".($start+1)."+".($start+2)."...+$max= $sum</B><br/>";
	}
?>

</body>
</html>