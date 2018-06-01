<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三元運算子</title>
</head>

<?php
	$invoice=TRUE; 	//代表「發票有中頭獎」
	echo $invoice ? "環島旅行<br/>" : "繼續搜集發票<br/>";		//三元運算子~  ?  "TRUE part" : "FALSE part" 
?>

<body>
</body>
</html>