<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>郵件測試 1</title>
</head>

<body>
<?php
$to      = 'XXX@XXX.xxx';  //改為收件者地址
$subject = "=?UTF-8?B?".base64_encode("中文標題信件測試1")."?=";  //郵件主旨(中文編碼問題)
$message = "這是使用PHP發送郵件測試 1\r\nUsing mail()";  //郵件本文
$headers = 'From: XXX@XXX.xxx' . "\r\n" .  //改為發信者地址
    'Reply-To: XXX@XXX.xxx' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){  //系統畫面
	echo "發送成功!";
}else{
	echo "發送失敗!";
}
?> 
</body>
</html>