<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
$p=$_POST['price'];
$a=$_POST['amount'];//建議前端直接限定選擇範圍
echo "單價為：".$p."元<br>";
echo "數量為：".$a."盒<br>";
$total=$p*$a;
echo "合計為：".$total."元";
?>
<body>
<button onClick="history.back()">&larr;</button>
</body>
</html>