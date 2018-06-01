<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>echo 與 print 指令</title>
</head>

<body>
<?php
	 $greeting="Hello!";
	 $name="Tom";
	 
	 echo $greeting, $name, "<br>";
	 echo $greeting. $name. "<br>";
	 echo "How are you? <br>";
	 echo "<hr>";   /* 劃水平線  */
	
	 print "$greeting $name <br>"; 
	 print "How are you? <br>"; 
?>
</body>
</html>