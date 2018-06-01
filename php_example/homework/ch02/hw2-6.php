<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>
<?php
$name = "阿財"; //姓名(字串 string)
$year	= 4; //年級別(整數integer)
$height	= 150; //身高(整數integer)
define("sex","男");	//常數宣告(常數名稱,內容)

echo "姓名: $name<br/>";
echo "年級別: $year<br/>";
echo "身高: $height<br/>";
echo "性別: ".sex."<br/>";
echo "符合資格否：".($height >= 150 && $year > 4 || sex == "男")."<p>";
echo "<hr/>";	

$name = "小美"; //姓名(字串 string)
$year	= 5; //年級別(整數integer)
$height	= 151; //身高(整數integer)
define("sex1","女");	//常數宣告(常數名稱,內容)

echo "姓名: $name<br/>";
echo "年級別: $year<br/>";
echo "身高: $height<br/>";
echo "性別: ".sex1."<br/>";
echo "符合資格否：".($height >= 150 && $year > 4 || sex1 == "男")."<p>";
echo "<hr/>";

$name = "麗麗"; //姓名(字串 string)
$year	= 4;	//年級別(整數integer)
$height	= 160; //身高(整數integer)
define("sex2","女");	//常數宣告(常數名稱,內容)

echo "姓名: $name<br/>";
echo "年級別: $year<br/>";
echo "身高: $height<br/>";
echo "性別: ".sex2."<br/>";
echo "符合資格否：".($height >= 150 && $year > 4 || sex2 == "男")."<p>";
echo "<hr/>";
?>
<body>
<button onClick="history.back()">&larr;</button>
</body>
</html>