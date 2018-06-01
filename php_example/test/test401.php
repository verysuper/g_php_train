<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
$sum = 0;
$cnt = 0;
echo "分別為 ： <br>";
for($count=1; $count<=500; $count++){
if($count % 3 == 0 && $count % 5 == 0){	//除以2餘數為1則為奇數
echo $count."<br>";
$cnt++;
$sum += $count;
}
}
echo "<hr>";
echo "1 ~ 500 間的3跟5公倍數 [個數] 為 $cnt<br/>";
echo "1 ~ 500 間的3跟5公倍數 [累加和] 為 $sum<br/>";
?>
<body>
</body>
</html>