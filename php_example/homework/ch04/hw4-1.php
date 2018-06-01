<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    if(!empty($_POST['n1']))
    {
        $n1=$_POST['n1'];
        echo "用for求: ";
        for($i=1;$i<=100;$i++)
        {
            if($i%$n1==0)
            {
                echo "{$i},";
            }
			echo ",";
        }
        echo "<br>用while求: ";
        $i=1;
        while($i<=100)
        {
            $i++;
            if($i%$n1==0)
            {
                echo "{$i},";
            }
        }
    }
?>
<body>
<form action="" id="form1" name="form1" method="post">
<pre>請撰寫一程式，接受輸入一個整數，
並且列出 1 ~ 100 當中，為該整數的倍數分別有哪些？
</per>
<p>
    <label for="n1">輸入數字:</label>
    <input type="number" name="n1" id="n1" />
    <input type="submit" name="button" id="button" value="送出" />
</p>
</form>
<button onClick="history.back()">&larr;</button>
<hr>
<pre>
    if(!empty($_POST['n1']))
    {
        $n1=$_POST['n1'];
        echo "用for求: ";
        for($i=1;$i<=100;$i++)
        {
            if($i%$n1==0)
            {
                echo "{$i},";
            }
        }
        echo "<br>用while求: ";
        $i=1;
        while($i<=100)
        {
            $i++;
            if($i%$n1==0)
            {
                echo "{$i},";
            }
        }
    }
</per>
</body>
</html>