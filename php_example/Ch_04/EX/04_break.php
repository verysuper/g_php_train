<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>break</title>
</head>

<body>
<?php  
    $i = 0;
    while (++$i<10) {
      switch ($i) {
        case 3:        
          break 1;  // 離開 switch
        case 7:         
          break 2; // 離開 while 
        default:
          echo "\$i=$i <br>";
          break;
      }    
    } 
?>
</body>
</html>