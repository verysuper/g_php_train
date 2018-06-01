<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
	$link = mysql_connect("localhost", "root", "00000000");
	if (!$link){
		die('連線錯誤: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db("studentdb",$link);
	$sql = "SELECT * from student";
	$result = mysql_query($sql,$link);
	print_r(mysql_fetch_row($result));
	$num = mysql_num_rows($result);
	print_r($num);
	mysql_close($link);
?>
</body>
</html>