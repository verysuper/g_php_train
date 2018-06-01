<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>雙向條件if...else</title>
</head>

<?php
	$lottery=TRUE;  //代表「樂透」中頭獎了
	if($lottery){
	  echo "環島旅行<br/>";
	  echo "出國旅行<br/>";
	  echo "還可以有更多喔!<br/>";
	}else{
	  echo "繼續去消費<br/>";
	  echo "再嘗試一次<br/>";
	  echo "還可以有更多喔!<br/>";
	}
?>

<body>
</body>
</html>