<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
$sum = 0;
$cnt = 0;
$count=1;
echo "分別為 ： <br>";


while(true){
if($count % 3 == 0 && $count % 5 == 0){	
echo $count."<br>";
$cnt++;
if($sum>=5000){break;}
else{$sum += $count;}
}

$count++;
}


echo "<hr>";
echo "1 ~ 500 間的3跟5公倍數 [個數] 為 $cnt<br/>";
echo "1 ~ 500 間的3跟5公倍數 [累加和] 為 $sum<br/>";
?>
<body>
</body>
</html>