<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<form action="" id="form1" name="form1" method="post">
    <pre>
    </pre>
    <p>
        <label for="n1">輸入數字:</label>
        <input type="number" name="min" id="n1" />
        <input type="number" name="max" id="n2" />
        <input type="submit" name="button" id="button" value="送出" />
    </p>
</form>
</body>
</html>
<?php
	$min=isset($_POST["min"])?$_POST["min"]:die("請輸入最小值");
	$max=isset($_POST["max"])?$_POST["max"]:die("請輸入最大值.");
	
	echo $min . "," . $max ;
	//compute(,$_POST["max"]); 
	
//	function compute($start,$max=20){
//		$sum = 0;
//		for($i=$start; $i<=$max; $i++){
//		  $sum += $i;
//		}
//		echo "<B>$start+".($start+1)."+".($start+2)."...+$max= $sum</B><br/>";
//	}
?>