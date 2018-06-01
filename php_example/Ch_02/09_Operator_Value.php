<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>傳值設定</title>
</head>

<body>
<?php
	$a=10;
	$b=$a;      // 傳值設定
	echo "\$a=$a, \$b=$b <br>" ; 
	$a=$a+10;   // $a 變數改變值, 不會影響 $b
	echo "\$a=$a, \$b=$b <br>" ;    
	$b=$b/2;     // $b 變數改變值, 不會影響 $a
	echo "\$a=$a, \$b=$b <br>" ;    
?>
</body>
</html>