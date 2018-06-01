<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>continue</title>
</head>

<body>
<?php  
    $i=0;
    while (++$i<5) // Loop 1
    {
      $j=0;
      while (true)  // Loop 2
      {
        $j++;  
        $k=0; 
        while (true) // Loop 3
        {
          $k++; 	
          echo "\$i=$i \$j=$j \$k=$k <br>";           
          if ($k==2)
            continue 3;
        }
         echo "這行永遠不會執行 <br>";
      }   
    }
?>
</body>
</html>