<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>
table{margin: auto;border: 1px solid;width: calc(100%/3); border-collapse: collapse;}
td{border: 1px solid;}
</style>


<script src="SpryAssets/SpryData.js"></script>
<script src="SpryAssets/xpath.js"></script>
<script>
var ds=new Spry.Data.XMLDataSet("xml/photo1.xml","data/sheep");
</script>


</head>

<body>
<div spry:region="ds">
<table>
<tr>
<th>圖片</th>
<th>標題</th>
<th>描述</th>
</tr>
<tr spry:repeat="ds">
<td><img src="sheep/{picture}" alt="" width="200"></td>
<td>{subject}</td>
<td>{description}</td>
</tr>
</table>
</div>
</body>
</html>