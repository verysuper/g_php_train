<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<button onClick="history.back()">&larr;</button>
</body>
</html><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>chosen下拉框搜尋</title>
<link rel="stylesheet" href="chosen.css" />
<style>
select{
width: 200px;
}
</style>
</head>
<body>

<select name="test" data-placeholder="選擇地址" id="test" class="test"> 
<option value="%">請選擇縣市...</option>
<option value="基隆市" >基隆市</option>
<option value="臺北市" >臺北市</option>
<option value="新北市" >新北市</option>
<option value="桃園市" >桃園市</option>
<option value="新竹市" >新竹市</option>
<option value="新竹縣" >新竹縣</option>
<option value="苗栗縣" >苗栗縣</option>
<option value="臺中市" >臺中市</option>
<option value="彰化縣" >彰化縣</option>
<option value="南投縣" >南投縣</option>
<option value="雲林縣" >雲林縣</option>
<option value="嘉義市" >嘉義市</option>
<option value="嘉義縣" >嘉義縣</option>
<option value="臺南市" >臺南市</option>
<option value="高雄市" >高雄市</option>
<option value="屏東縣" >屏東縣</option>
<option value="臺東縣" >臺東縣</option>
<option value="花蓮縣" >花蓮縣</option>
<option value="宜蘭縣" >宜蘭縣</option>
<option value="澎湖縣" >澎湖縣</option>
<option value="金門縣" >金門縣</option>
<option value="連江縣" >連江縣</option>
<option value="a123">a123</option>
<option value="b345">b345</option>
<option value="c3567">c3567</option>
<option value="d13555">d13555</option>
<option value="f7878">f7878</option>
</select>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="chosen.jquery.js"></script>
<script>
$(function(){
$('.test,.dept_select').chosen({
search_contains: true
});
});
</script>
</body>
</html>