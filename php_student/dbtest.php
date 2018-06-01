<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?
$userName="root"; //帳號
$password="00000000"; //密碼
$hostName="localhost"; //主機(Server)名稱

if (!(@ $link=mysql_connect($hostName, $userName, $password))){
	printf("<Br> 連結主機 %s 發生錯誤 <br>", $hostName);
	exit();
}else{
	printf("<Br> 連結主機 %s 成功 <br>", $hostName);
	exit();
}
?>
</body>
</html>