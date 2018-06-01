<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>foreach 迴圈</title>
</head>

<body>
<?php 
   $a=array(
        array(1,3,5,7,9),
        array(2,4,6),
        array(11,13,15,17),
        array(12,14,16,18,20)
      );
   foreach($a as $k1=>$a1)
   { 
     foreach($a1 as $k2=>$a2)
       echo " \$a[$k1][$k2]=" . $a[$k1][$k2]; 
     echo "<br>"; 	       
   }   
?>
</body>
</html>