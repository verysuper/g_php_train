<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
if(!empty($_POST['num'])){
$num=$_POST['num'];
echo "您輸入的數字為：".$num."<br>";
if($num%3==0 && $num%5==0){	echo "此數為3跟5的公倍數"."<br>";	}
elseif($num%3==0){	echo "此數為3的倍數"."<br>";	}
elseif($num%5==0){	echo "此數為5的倍數"."<br>";	}
else{echo "此數皆不為3跟5的倍數"."<br>";	}
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