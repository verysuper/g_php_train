<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>嵌入 PHP 程式碼的寫法</title>
</head>

<body>
<?php	 echo "這是 PHP 輸出的文字<br>"; ?>

<? echo "這是 ? 輸出的文字，須設定 php.ini 的 short_open_tag = On<br>";	?>

<% echo " 這是 % 輸出的文字，須設定 php.ini 的 asp_tags = On 目的是避免和ASP程式混淆，並重新啟動Apache<br>"; %>

<script language="javascript" type="text/javascript">
	alert("HELLO WORLD !!!  javascript腳本語言描述");
</script>
</body>
</html>