<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生成績輸入</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="Proc.php">
  <table width="200" border="1" align="center">
    <tr>
      <td>學號</td>
      <td><input name="studno" type="text" id="studno" size="10" /></td>
    </tr>
    <tr>
      <td>姓名</td>
      <td><input name="name" type="text" id="name" size="10" /></td>
    </tr>
    <tr>
      <td>國文</td>
      <td><input name="chi" type="text" id="chi" size="6" /></td>
    </tr>
    <tr>
      <td>英文</td>
      <td><input name="eng" type="text" id="eng" size="6" /></td>
    </tr>
    <tr>
      <td>數學</td>
      <td><input name="math" type="text" id="math" size="6" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
    <tr>
      <td><img alt="（若看不到驗證碼，請重新整理網頁。）" src="picauth.php" /></td>
      <td><input name="txtcode" type="text" size="6" id="txtcode" /></td>
    </tr>
  </table>
</form>
</body>
</html>