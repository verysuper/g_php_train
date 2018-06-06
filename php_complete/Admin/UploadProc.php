<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>檔案上傳</title>
</head>

<body>
<?php 
//透過$_FILES['xxx']讀取上傳檔案資料
$userfile = $_FILES["UserFile"];
showDetail($userfile);
fileCopy($userfile);
deleteFile($userfile);
?>
</body>
</html>
<?php
/*顯示上傳檔案的詳細資料，包括了「名稱」、「類型」
  、「暫存檔名」、「錯誤代碼」、「檔案大小」*/
function showDetail($file){
	foreach($file as $key => $value){
		echo "<font color=red><B>$key:</B></font> $value<br/>";
	}
	echo "<hr/>";
}

//將上傳至暫存區中的檔案存至實際欲存放的目錄下
function fileCopy($file){
	if(copy($file['tmp_name'],"upload/userupload.zip")){
		echo "<B>檔案上傳成功!</B>";
	}else{
		echo "<B>錯誤：無法複製檔案...</B>";
	}
}

//將檔案複製至實際目錄後，接著將暫存檔案刪除
function deleteFile($file){
	unlink($file['tmp_name']);
}
?>