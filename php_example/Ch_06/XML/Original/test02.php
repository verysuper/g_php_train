<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>
ul{list-style-type: none;margin: 0 auto;padding: 0;background: #ccc;width: 50%;text-align: center;}
ul li a{width: 200px;height: 150px;float: left;}
</style>
<script src="SpryAssets/SpryData.js"></script>
<script src="SpryAssets/xpath.js"></script>
<script>
	var ds=new Spry.Data.XMLDataSet("xml/photo1.xml","data/sheep");
</script>
</head>

<body>
<!--ul>li*6>a>img[src=http://placeimg.com/200/150]-->
<div spry:region="ds">
<ul>
<li spry:repeat="ds"><a href=""><img src="sheep/{picture}" alt="" width="200"></a></li>
</ul>


</div>
<div id="message" spry:detailregion="ds">
<h1>{subject}</h1>
<p>{description}</p>
</div>
</body>
</html>