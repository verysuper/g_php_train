<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP讀取(GET方法)</title>
</head>
<?php
	$name = $_GET['name'];
	$love = $_GET['love'];
	echo "<font size=5> $name 您好，您喜愛的補習班是 $love</font><br/>";
?>
<body>
</body>
</html>