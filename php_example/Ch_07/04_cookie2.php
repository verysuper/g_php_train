<?php
	setcookie("c1","");//清除Cookie c1變數
	//清除Cookie c2變數，並且設定生命週期從目前起減少20分鐘
	setcookie("c2","",time()-1200);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cookies介紹二</title>
</head>

<body>
	<a href="03_cookie1.php">查看Cookie變數</a>
</body>
</html>