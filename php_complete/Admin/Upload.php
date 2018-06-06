<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>單一檔案上傳</title>
</head>

<body>
<h2>～單一檔案上傳示範～ </h2>
<form action="UploadProc.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>請選擇上傳檔案：
    <input name="MAX_FILE_SIZE" type="hidden" id="MAX_FILE_SIZE" value="2097152" />
  </p>
  <p>
    <input type="file" name="UserFile" id="UserFile" />
    <input type="submit" name="button" id="button" value="送出" />
  </p>
</form>
</body>
</html>