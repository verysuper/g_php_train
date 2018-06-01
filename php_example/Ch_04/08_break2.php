<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>break介紹</title>
</head>

<?php
	$sum = 0;
	
	for($count=1; $count<=10; $count++){
		$sum += $count;
		if( $sum >= 25 ){
			break; 		//立即結束迴圈執行
		}
		echo "count= $count , sum= $sum<br/>";
	}
	echo "--------------------------------------<br/>";
	echo "count= $count &nbsp; sum = $sum<br/>";
?>

<body>
</body>
</html>