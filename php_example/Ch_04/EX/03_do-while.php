<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>do-while 迴圈</title>
</head>

<body>
<?php 
   $a=array(1,3,5,7,9);
   $cnt=count($a);
   echo "do-while loop: <br>";
   $i=0; 
   do { 
     echo "\$a[$i]=$a[$i] <br>";        	      	
     $i++;
   } while ($i<$cnt);
?>
</body>
</html>