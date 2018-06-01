<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>switch 條件判斷</title>
</head>

<body>
<?php 
    $i=2;
    switch ($i) 
    {
      case 0:
        echo "i equals 0 <br>";
        break;
      case 1:
        echo "i equals 1 <br>";
        break;
      case 2:
        echo "i equals 2 <br>";
        break;
      default:
        echo "i is not equal to 0, 1 or 2";       
    }
    
	$grade='B';
    switch ($grade) 
    {
      case 'A':
        echo "You are excellent! <br>";  
       break;
      case 'B':
        echo "You are great! <br>"; 
        break;  
      case 'C':
        echo "You must work hard! <br>"; 
        break;                  
      default:
        echo "What happened to you! <br>"; 
        break;                        
    }
?>
</body>
</html>