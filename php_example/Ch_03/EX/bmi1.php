<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>～BMI值計算～</title>
</head>

<body>
<center>
  <h2>～BMI值計算～</h2>
  <p>身體質量指數的計算方法是以體重（公斤）除以身高（公尺）的平方，<br />
    最健康的BMI值為 22，若身體質量指數超過 23 為過重，超過 27 為肥胖，若超過 35 則為極度肥胖<br />
    綜合上述我們歸納出了一些簡易的原則，並且整理出如下的數據資料：<br />
    體重過輕 ：BMI ＜ 18.5<br />
    理想體重範圍為 18.5 ≦ BMI ＜ 24<br />
    異常過重：24 ≦ BMI ＜ 27<br />
    輕度肥胖 ： 27 ≦ BMI ＜ 30<br />
    中度肥胖 ：30 ≦ BMI ＜ 35<br />
  重度肥胖 ：BMI ≧ 35</p>
</center>
<form id="form1" name="form1" method="post" action="bmi_proc1.php">
  <table width="200" border="1" align="center">
    <tr>
      <td>體重:</td>
      <td><input name="textfield" type="text" id="textfield" size="10" />
      kg</td>
    </tr>
    <tr>
      <td>身高:</td>
      <td><input name="textfield2" type="text" id="textfield2" size="10" />
      cm</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
</form>
</body>
</html>