<?php require_once('../Connections/sql4.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員功能啟用</title>
</head>

<body>
<?php
$uid = $_GET['uid'];
//將users資料中的user_id欄位,使用md5()函式數位演算後與接收到的$uid進行比較
$sqlstr="update users set auth_priv='y' where md5(user_id)='$uid'";
if(mysql_query($sqlstr)){
	echo "會員功能啟用成功、歡迎您的加入!";	
}else{	
	echo "會員功能啟用失敗!";	
}
?>
</body>
</html>