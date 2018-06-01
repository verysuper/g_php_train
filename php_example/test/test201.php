<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
	<?php
	$name 	= $_POST["name"]; 	//姓名(字串 string)
	$age  	= $_POST["age"]; 			//年齡(整數 integer)
	$height = $_POST["height"];		//身高(浮點數 float)
	$weight = $_POST["weight"];			//體重(浮點數 float)
	$sex = $_POST["sex"];
	//define(sex,"男");			//常數宣告(常數名稱,內容)
	
	$BMI	= $weight / (($height/100)*($height/100));	//BMI = 體重 (kg) / 身高平方 (m2)
	
	echo "姓名: $name<br/>";
	echo "年齡: $age<br/>";
	echo "身高: $height<br/>";
	echo "體重: $weight<br/>";
	//echo "性別: ".sex."<br/>";		//讀取常數內容(請參考後面字串串接)
	
	echo "BMI: $BMI<br/>";
?>
<body>

<form id="form1" name="form1" method="post" action="test201.php">
    <label for="name">姓名:</label>
    <input type="text" name="name" id="name"><br/>
    <label for="age">年齡:</label>
    <input type="text" name="age" id="age"><br/>
    <label for="height">身高:</label>
    <input type="text" name="height" id="height"><br/>
    <label for="weight">體重:</label>
    <input type="text" name="weight" id="weight">
    <p>
    性別
      <label>
        <input type="radio" name="RadioGroup1" value="m" id="RadioGroup1_0">
        男</label>
      <label>
        <input type="radio" name="RadioGroup1" value="f" id="RadioGroup1_1">
        女</label>
      <br>
    </p>
    <br/>
    
</form>
</body>
</html>