<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>鏈狀式結構(elseif)</title>
</head>

<?php
	$age = 16; //代表年齡16歲
	
	if($age >= 18){
	echo "可以看限制級電影!<br/>";
	}elseif($age >= 12){
	  echo "可以看輔導級電影!<br/>";
	}elseif($age >= 6){
	  echo "可以看保護級電影!<br/>";
	}elseif($age < 6){
	  echo "可以看普通級電影!<br/>";
	}
?>

<body>
</body>
</html>