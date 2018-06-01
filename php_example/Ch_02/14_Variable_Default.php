<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>預設變數</title>
</head>

<body>
<?php
   echo "\$_SERVER 變數 : ". "<p>";     
   echo "\$_SERVER['PHP_SELF']=" 
        . $_SERVER['PHP_SELF'] . "<br>";   
   echo "\$_SERVER['SERVER_ADDR']=" 
        . $_SERVER['SERVER_ADDR' ] . "<br>";    
   echo "\$_SERVER['SERVER_NAME']=" 
        . $_SERVER['SERVER_NAME'] . "<br>";
   echo "\$_SERVER['SERVER_PORT']=" 
        . $_SERVER['SERVER_PORT'] . "<br>";   
   echo "\$_SERVER['REMOTE_ADDR']=" 
        . $_SERVER['REMOTE_ADDR'] . "<br>";
   echo "\$_SERVER['SERVER_SOFTWARE']=" 
        . $_SERVER['SERVER_SOFTWARE']. "<br>";
   echo "\$_SERVER['REQUEST_METHOD']=" 
        . $_SERVER['REQUEST_METHOD']. "<br>";
   echo "\$_SERVER['DOCUMENT_ROOT']=" 
        . $_SERVER['DOCUMENT_ROOT']. "<br>"; 
   echo "\$_SERVER['HTTP_USER_AGENT']=" 
        . $_SERVER['HTTP_USER_AGENT']. "<br><hr>";       
   
   echo "\$_ENV 變數 :". "<p>";   
   echo "\$_ENV['USERNAME']=" 
        . $_ENV['USERNAME'] . "<br>";  
   echo "\$_ENV['OS']=" 
        . $_ENV['OS'] . "<br>";     
   echo "\$_ENV['COMPUTERNAME']=" 
        . $_ENV['COMPUTERNAME'] . "<br>"; 
   echo "\$_ENV['SystemRoot']="
        . $_ENV['SystemRoot'] . "<br>";     
?>
</body>
</html>