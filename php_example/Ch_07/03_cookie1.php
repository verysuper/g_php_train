<?php
	setcookie('c1',$_COOKIE['c1']+=1);//設定Cookie c1變數
	//設定cookie c2變數，存活時間從目前時間起算，有20分鐘生命週期(1200秒)
	setcookie('c2',$_COOKIE['c2']+=2,time()+1200);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cookies介紹一</title>
</head>

<body>
<font size=4>
<?php
	echo "COOKIE c1: ".$_COOKIE['c1']."<br/>"; //輸出
	echo "COOKIE c2: ".$_COOKIE['c2']."<br/>"; //輸出
	echo "<a href=04_cookie2.php>清除Cookie</a>";
?>
</font>
</body>
</html>