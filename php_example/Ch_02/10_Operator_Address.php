<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>傳址設定</title>
</head>

<body>
<?php
	$a=10;
	$b=$a;      // $a 傳值設定給 $b
	$c=&$a;     // $a 傳址設定給 $c
	echo "1. 改變 \$a 的值之前 ....<br>";
	echo "\$a=$a, \$b=$b, \$c=$c <br><br>" ;   
	
	$a=20;
	echo "2. 改變 \$a 的值之後 ....<br>";
	echo "\$a=$a, \$b=$b, \$c=$c <br><br>" ;      
	
	$b=30;
	echo "3. 改變 \$b 的值之後 ....<br>";
	echo "\$a=$a, \$b=$b, \$c=$c <br><br>" ; 
	
	$c=40;
	echo "4. 改變 \$c 的值之後 ....<br>";
	echo "\$a=$a, \$b=$b, \$c=$c <br><br>" ;      
?>
</body>
</html>