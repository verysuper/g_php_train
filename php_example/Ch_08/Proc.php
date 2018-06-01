<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生成績處理</title>
</head>

<body>
<?php
//讀取前一個面傳遞的參數
$stduno 	= $_POST['studno'];	//學號
$name		= $_POST['name'];	//姓名
$chi		= $_POST['chi'];	//國文
$eng		= $_POST['eng'];	//英文
$math		= $_POST['math'];	//數學
$txtcode 	= $_POST['txtcode'];//驗證碼
//讀取session驗證碼、接著判斷驗證碼是否正確
if($_SESSION['imgcode'] == $txtcode){
	$sum = $chi+$eng+$math;	//計算總分
	$avg = number_format($sum/3,1);	//計算平均，取至小數1位
	echo "學號：$studno<br/><br/>姓名：$name<br/>國文：$chi<br/>";
	echo "英文：$eng<br/>數學：$eng<br/>";	 
	echo "總分：$sum<br/>平均：$avg<br/>";
}else{
	echo "驗證碼不正確請回<a href=\"javascript:history.back()\">上一頁</a>重新輸入";
}
?>
</body>
</html>