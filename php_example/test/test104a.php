<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>無標題文件</title>
</head>
<fieldset>
<legend>欄位集</legend>
<?php
$user=$_POST['user'];
$url=$_POST['url'];
$mail=$_POST['mail'];


echo "姓名： $user"."<br>";

echo "網址： <a href='$url'>$url</a>"."<br>";
echo "E-Mail： <a href='mailto:$mail'>$mail</a>"."<br>";
?>
</fieldset>
<body>
</body>
</html>