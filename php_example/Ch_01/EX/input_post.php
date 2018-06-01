<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP輸入(POST方法)</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="process_post.php">
  <table width="315" border="1" align="center">
    <tr>
      <td>姓名：</td>
      <td><input name="name" type="text" id="name" size="16" /></td>
    </tr>
    <tr>
      <td>最愛的補習班：</td>
      <td><input name="love" type="text" id="love" size="16" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
</form>
</body>
</html>