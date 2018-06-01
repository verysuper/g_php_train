<?php
//	$a=$_GET['num1'];
//	$b=$_GET['num2'];
//	$c=$_GET['num3'];
//	
//	if($a>$b && $a>$c){
//	echo "整數1: $a 為最大整數";
//	}
//	if($b>$c && $b>$a){
//	echo "整數2: $b 為最大整數";
//	}
//	if($c>$a && $c>$b){
//	echo "整數3: $c 為最大整數";
//	} 

$a=$_GET['num1'];
$b=$_GET['num2'];
$c=$_GET['num3'];

if($a>=$b && $a>=$c){
echo "整數1: $a 為最大整數<br>";
if($a==$b){
echo "整數2: $b 也為最大整數<br>";
}
if($a==$c){
echo "整數3: $c 也為最大整數<br>";
}
}
elseif($b>=$c && $b>=$a){
echo "整數2: $b 為最大整數<br>";
if($b==$c){
echo "整數3: $c 也為最大整數<br>";
}
if($b==$a){
echo "整數1: $a 也為最大整數<br>";
} 
}
elseif($c>=$a && $c>=$b){
echo "整數3: $c 為最大整數<br>";
if($c==$a){
echo "整數1: $a 也為最大整數<br>";
}
if($c==$b){
echo "整數2: $b 也為最大整數<br>";
} 
} 
?>

<p>請輸入三個整數：</p>
<form id="form1" name="form1" method="get" action="hw3-1.php">
<p>
<label for="num1">整數 1：</label>
<input type="text" name="num1" id="num1" />
<label for="num2">整數 2：</label>
<input type="text" name="num2" id="num2" />
<label for="num3">整數 3：</label>
<input type="text" name="num3" id="num3" />
</p>
<p>
<label for="button"></label>
<input type="submit" name="button" id="button" value="按下我比較大小" />
<label for="button2"></label>
<input type="submit" name="button2" id="button2" value="再試一次" />
</p>
<button onClick="history.back()">&larr;</button>
</form>