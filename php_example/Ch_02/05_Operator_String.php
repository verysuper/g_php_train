<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>字串（串接）運算子</title>
</head>

<body>
<?php
	$a = "Hello";
	$b = $a . "Gjun";		 //現在 $b 的內容已經是「Hello Gjun」 的字串了
	echo $a."<br/>".$b."<p>";
?>
<?php          
     $name = "John";      
     $greeting1 = "Hello! $name.";
     echo $greeting1 . "<br>" ;      
     
     $greeting2 = 'Hello! $name.';
     echo $greeting2 . "<br>" ;               
?>
</body>
</html>