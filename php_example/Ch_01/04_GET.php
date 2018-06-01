<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用GET輸入/讀取</title>
</head>

<body>
<?php
	$name=$_GET['name'];
	$email=$_GET['email'];
	$checkbox=$_GET['checkbox'];
	$message=$_GET['message'];			
	
	echo "筆名：$name<br>";
	echo "E-Mail：$email<br>";
	echo "是否公開 E-Mail：$checkbox<br>";
	echo "留言：<br>$message";
?>
</body>
</html>