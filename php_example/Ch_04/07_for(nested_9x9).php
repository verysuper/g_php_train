<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>九九乘法表</title>
</head>

<?php
	echo "<table border=\"1\">";			//印出<table border="1">
	for($row=2; $row<=9; $row++){ 	//代表「列」
		echo "<tr>";									//印出表格「列<tr>」
		for($col=1; $col<=9; $col++){ 	//代表「欄」
															//印出列的「欄<td>」 內容  結束「欄</td>」 
			echo "<td>$row*$col= ".($row*$col)."</td>";
		}
		echo "<tr/>";								//結束「列</tr>」
	}
	echo "</table>";								//結束表格</talbe>
?>

<body>
</body>
</html>