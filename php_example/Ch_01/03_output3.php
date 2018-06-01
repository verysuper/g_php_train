<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP進階輸出</title>
<script language="javascript" type="text/javascript">
	alert("Hello JavaScript!");
	alert("請檢視原始碼!");
	alert("請注意程式碼撰寫位置!!");
</script>
</head>
<?php
	echo phpinfo();			//PHP資訊
	echo PHP_VERSION;		//這個常數是用來取得PHP版本、例如：5.2.6
	echo PHP_OS;				//這個常數是用來取得作業系統、例如：WINNT
	echo true;					//這個常數就是「真」值（TRUE），預設輸出 1
	echo false;					//這個常數就是「假」值（FALSE），預設不輸出
?>
<body>
程式語法如下：<br />
&lt;?php<br />
echo phpinfo();<br />
?&gt;
</body>
</html>