<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜尋引擎網址</title>
</head>

<body>
<?php
	$txt=$_POST['searchtxt'];
	echo "您想要搜尋的內容是： ".$txt." 嗎?<br>";
	echo "[<a href=http://www.google.com/search?q=".$txt.">前往Google</a>]<br>";
?>
</body>
</html>