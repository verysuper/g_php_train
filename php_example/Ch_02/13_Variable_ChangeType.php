<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>以型態轉換運算元強制型態轉換</title>
</head>

<body>
<?php
    // 1. 強制轉換成整數
    $a=25.34;
    echo "轉換前 \$a=$a, 型態是 " . gettype($a) . "<br>"; 
    $a=(int)$a;
    echo "轉換後 \$a=$a, 型態是 " . gettype($a) . "<br><hr>"; 
    // 2. 強制轉換成浮點數
    $a="55.7 degrees";
    echo "轉換前 \$a=$a, 型態是 " . gettype($a) . "<br>"; 
    $a=(double)$a;
    echo "轉換後 \$a=$a, 型態是 " . gettype($a) . "<br><hr>";     
    // 3. 強制轉換成字串
    $a=89.234;
    echo "轉換前 \$a=$a, 型態是 " . gettype($a) . "<br>"; 
    $a=(string)$a;
    echo "轉換後 \$a=$a, 型態是 " . gettype($a) . "<br><hr>";           
?>
</body>
</html>