<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已使用函數</title>
</head>

<body>

<?php
	$name="陳桶一";
	$score=76;
	scorepass();  //呼叫 scorepass() 函數
	
	$name="黃光權";
	$score=49;
	scorepass();  //呼叫 scorepass() 函數
	
	$name="李箂富";
	$score=58;
	scorepass();  //呼叫 scorepass() 函數
	
	function scorepass(){
		global $name,$score;
		if($score >= 60){
			echo "$name, 您及格了!(function)<br/>";
		}else if($score >= 50){
			echo "$name, 您可以補考!(function)<br/>";
		}else{
			echo "$name, 明年再來!(function)<br/>";
		}
		echo "<hr/>";		
	}
?>

</body>
</html>