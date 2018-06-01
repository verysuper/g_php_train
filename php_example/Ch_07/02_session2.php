<?php
	session_start();	//啟動Session
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Session介紹二</title>
</head>

<body>
<font size=4>
<?php
	$_SESSION['s3'] += 1; 					//註冊Session s3變數累加1
	echo "Session id:".session_id()."<hr/>";
	echo "Session s3: ".$_SESSION['s3']."<br/>"; 	//輸出Session s3變數
	echo "<a href=01_session1.php target=_blank>開啟新視窗</a>";
?>
</font>
</body>
</html>