<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>預設常數</title>
</head>
<?php
  define (GREETING_MSG,"Bonjour, ");
  define (THANKS_MSG,"Merci, ",1);		//屬性"1"：設定常數名稱大小寫皆相同
  define (PI, 3.14159); 
?>
<body>
<?php   
    function MsgFunction()  
    {          	     
      echo GREETING_MSG . "Jacqueline" . ". <br>"; 
      echo Greeting_MSG . "Jean Paul" . ". <br>"; 
      echo THANKS_MSG . "Jean Paul" . ". <br>"; 
      echo Thanks_MSG . "Jean Paul" . ". <br>";   
      echo PI * 5 . "<br>";    
      if (defined('GREETING_MSG'))
        echo 'GREETING_MSG is already defined as ' . '"'. GREETING_MSG . '"'. '<br>' ;
  		    echo "All constats are as below: <br>";        
      print_r(get_defined_constants(true));   	//取回預設常數   
    } 
    MsgFunction();  
?>
</body>
</html>