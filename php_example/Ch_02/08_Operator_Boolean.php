<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>布林值與迴圈</title>
</head>

<body>
<?php
	echo "While loop: <br>";
	$go_on=true;
	$a=1;
	
	while ($go_on)
	{ 
		echo "$a <br>"; 	   	
		$a++;
		if ($a>5)
	   		$go_on=false;
	} 
?>
</body>
</html>