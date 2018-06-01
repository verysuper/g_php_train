<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="hw5-2POST.php">
請輸入從
<input name="num1" type="text" id="num1" size="5" />
到
<input name="num2" type="text" id="num2" size="5" />
的
<select name="num3" id="num3">
<option value="1">奇數</option>
<option value="0" selected>偶數</option>
</select>
<input name="" type="checkbox" id="" checked>我同意
並計算其總和
<input type="submit" name="button" id="button" value="送出" />
</form>
</body>
</html>
<?php
$start=$_POST['num1'];
$max=$_POST['num2'];
$p=2;
$t=$_POST['num3'];

for($i=$start;$i<=$max;$i++){
if($i%$p==$t){
$sum+=$i;
}
}

if($t==0){
echo "您輸入的值為 $start ~ $max ，其之間的 偶數 總和為：".$sum;	
}else{
echo "您輸入的值為 $start ~ $max ，其之間的 奇數 總和為：".$sum;
}
?>