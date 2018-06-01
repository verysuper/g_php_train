<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多檔上傳</title>
</head>

<body>
<?php
//透過$_FILES['xxx']讀取上傳檔案資料(二維陣列格式)
$userfile = $_FILES['userFile'];

//顯示詳細資訊
foreach($userfile as $key => $value){
    showDetail($key,$userfile[$key]);
}

//複製至目的地
foreach($userfile['tmp_name'] as $key => $value){
    if($value != NULL){
	    fileCopy($key,$value);
	}
}
//刪除暫存檔
foreach($userfile['tmp_name'] as $key => $value){
    if($value != NULL){
	    deleteFile($value);
	}
}
?>
</body>
</html>
<?php
/*顯示上傳檔案的詳細資料，包括了「名稱」、「類型」
  、「暫存檔名」、「錯誤代碼」、「檔案大小」*/
function showDetail($msg,$file){
	foreach($file as $key => $value){
		echo "<font color=red><B>$msg $key:</B>
		</font> $value<br/>";
	}
	echo "<hr/>";
}

//將上傳至暫存區中的檔案存至實際欲存放的目錄下
//$key 表示檔案的序號 , $file 表示暫存檔的來源名稱
//寫至目的地的檔名為「userupload?.zip」
function fileCopy($key,$file){
	if(copy($file,"upload/userupload$key.zip")){
		echo "<B>檔案編號$key 上傳成功!</B><BR/>";
	}else{
		echo "<B>錯誤：無法複製檔案...</B><BR/>";
	}
}

//將檔案複製至實際目錄後，接著將暫存檔案刪除
function deleteFile($file){
	unlink($file);
}
?>