<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多檔上傳</title>
</head>

<body>
<h2>～多檔案上傳示範～ </h2>
<form action="MultiUploadProc.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="351" border="0">
    <tr>
      <td colspan="2">請選擇上傳檔案：
      <input name="MAX_FILE_SIZE" type="hidden" id="MAX_FILE_SIZE" value="2097152" /></td>
    </tr>
    <tr>
      <td width="96">檔案一：</td>
      <td width="274"><input type="file" name="userFile[]" id="userFile[]" /></td>
    </tr>
    <tr>
      <td>檔案二：</td>
      <td><input type="file" name="userFile[]" id="userFile[]" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
        <input type="submit" name="button" id="button" value="送出" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>