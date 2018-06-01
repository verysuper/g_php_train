<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>～BMI值計算結果～</title>
</head>

<body>
<?php
	$weight = $_POST['textfield'];
	$height = $_POST['textfield2'];
	$BMI	= number_format($weight / pow(($height/100),2),1);
		/*
		函數1:pow(float $base,float $exp)
		用途：計算次方值
		說明：$base : 為基底值
		     　 $exp : 為冪數
		函數2:number_format(float $number,int $decimls)
		用途：格式化數字字串
		說明：$number : 轉換格式的浮點數
		         $decimls : 小數位數
		*/
	
	echo "您的體重是：$weight kg</br>";
	echo "您的身高是：$height 公分</br>";
	echo "BMI計算結果 = $BMI<br/>測試結果：";
	if($BMI<18.5){
		echo "您體重過輕囉！<br/>";
	}else if($BMI<24){
		echo "恭喜您！您的體重在正常範圍！<br/>";
	}else if($BMI<27){
		echo "小心！體重過重囉！<Br/>";
	}else if($BMI<30){
		echo "注意！您有輕度肥胖的情形喔！<br/>";
	}else if($BMI<35){
		echo "警告！您有中度肥胖的問題呦！<br/>";
	}else{
		echo "嚴重警告！您是重度肥胖患者！...再不減肥，健康堪憂ㄚ...<br/>";
	}
?>
<p>體重過輕 ：BMI ＜ 18.5<br />
理想體重範圍為 18.5 ≦ BMI ＜ 24<br />
異常過重：24 ≦ BMI ＜ 27<br />
輕度肥胖 ： 27 ≦ BMI ＜ 30<br />
中度肥胖 ：30 ≦ BMI ＜ 35<br />
重度肥胖 ：BMI ≧ 35
<p>[<a href="bmi1.php">測試下一位</a>]
</body>
</html>