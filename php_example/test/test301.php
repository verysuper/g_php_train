<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
	$num=$_POST['num'];
	echo "您輸入的數字為：".$num."<br>";
	if($num%2==0){
	echo "此數為偶數"."<br>";	
	}else{
	echo "此數為奇數"."<br>";	
}
?>
<body>
<form id="form1" name="form1" method="post" action="">
<fieldset>
<legend>請輸入一個數字：</legend>
<input type="number" name="num" id=""> <!--使用number在手機會出現數字鍵盤-->

<input type="submit" value="送出">
</fieldset>
</form>
<button onClick="history.back()">&larr;</button>
</body>
</html>