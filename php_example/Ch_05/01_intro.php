<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>未使用函數</title>
</head>

<?php
	$name="陳桶一";
	$score=76;
	if($score >= 60){
		echo "$name, 您及格了!<br/>";
	}else if($score >= 50){
		echo "$name, 您可以補考!<br/>";
	}else{
		echo "$name, 明年再來!<br/>";
	}
	echo "<hr/>";
	
	$name="黃光權";
	$score=49;
	if($score >= 60){
		echo "$name, 您及格了!<br/>";
	}else if($score >= 50){
		echo "$name, 您可以補考!<br/>";
	}else{
		echo "$name, 明年再來!<br/>";
	}
	echo "<hr/>";
	
	$name="李箂富";
	$score=58;
	if($score >= 60){
		echo "$name, 您及格了!<br/>";
	}else if($score >= 50){
		echo "$name, 您可以補考!<br/>";
	}else{
		echo "$name, 明年再來!<br/>";
	}
	echo "<hr/>";
?>

<body>
</body>
</html>