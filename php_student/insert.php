<?php require_once('Connections/studentdb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1") && ($_POST["studno"] != "")) {
  $insertSQL = sprintf("INSERT INTO student (studno, name, phone, address) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['studno'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['address'], "text"));

  mysql_select_db($database_studentdb, $studentdb);
  $Result1 = mysql_query($insertSQL, $studentdb) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <p>
        <label for="studno">學號:</label>
        <input type="text" name="studno" id="studno" required><!--卡必填1-->
        </p>
        <p>
        <label for="name">姓名:</label>
        <input type="text" name="name" id="name">
        </p>
        <p>
        <label for="phone">電話:</label>
        <input type="text" name="phone" id="phone">
        </p>
        <p>
        <label for="address">地址:</label>
        <input type="text" name="address" id="address">
        </p>
        <input type="submit" value="新增學生資料" onClick="checkvalue()">
        <input type="hidden" name="MM_insert" value="form1">
    </form>
    <button onClick="history.go(-1)">Back</button>
    <script>
    	function checkvalue(){
				if(form1.studno.value == ''){
					alert('請輸入學號');
					return false;
				}
			}
    </script>
</body>
</html>