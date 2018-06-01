<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>函數區域變數</title>
</head>

<body>
<?php
    $a=10; 
    function TestFunction()  			 // 自訂函數
    {          	
      echo "印出 \$a 的值 (TestFunction) <br>";  //可嘗試在上方加一行 $a=20;，再嘗試執行
      echo "$a <br>";						 // 函數區域變數
    } 
    TestFunction();
    echo "印出 \$a 的值 (主程式) <br>";  
    echo "$a <br>"; 
?>
</body>
</html>