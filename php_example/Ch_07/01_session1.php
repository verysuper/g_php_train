<?php
	session_start();	//啟動Session
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Session介紹一</title>
</head>
<body>
<?php
	$_SESSION['s1'] += 1; //註冊Session s1變數
	$s2 += 1; 					//註冊s2一般變數
	echo "Session s1:".$_SESSION['s1']."<br/>"; 	//輸出Session s1變數
	echo "s2:".$s2."<br/>";									//輸出s2一般變數
?>
</body>
</html> 