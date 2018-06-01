<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>無標題文件</title>
<style>
body{margin: 0;}
.box{width: 100%;}
.box>img{width: 33vw;margin: 0;float: left;}
</style>
</head>
<?php
	for($row=1; $row<=3; $row++){
		echo "<div class=\"box\">";	
		for($col=1; $col<=3; $col++){ 
			echo "<img src=\"http://placeimg.com/500/500\" >";
		}
		echo "</div>";
	}
?>
<body>
	
</body>
</html>