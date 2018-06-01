<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>格式字串與純字串</title>
</head>
<body>
<?php
	$name = "王小明";
	echo "姓名: $name<br/>";		//格式字串(可以讀取變數)
	echo '姓名: $name<br/>';		//純字串(無法讀取變數)
?>
</body>
</html>