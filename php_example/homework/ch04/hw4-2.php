<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    if(!empty($_POST["n1"]))
    {
        $a2=1;
        $a1=1;
        $a;
        $n1=$_POST["n1"];
        echo "1->{$a2}<br>";
        echo "2->{$a2}<br>";
        $i=3;
        while($i<=$n1)
        {            
            $i++;
            $a=$a1+$a2;
            $a2=$a1;
            $a1=$a;
            echo "{$i}->{$a}<br>";
        }
    }
?>
<body>
<form action="" id="form1" name="form1" method="post">
    <pre>請撰寫一程式，可以輸出費氏數列；
    假設數列的第1與第2數皆為1；
    而第3數 則為前兩數相加的合，如此並依序類推。 
    建議事項：請使用 while迴圈完成。 
    輸出參考：1, 1, 2, 3, 5, 8, 13, 21, 34, …
    </pre>
    <p>
        <label for="n1">輸入數字:</label>
        <input type="number" name="n1" id="n1" />
        <input type="submit" name="button" id="button" value="送出" />
    </p>
</form>
<button onClick="history.back()">&larr;</button>
<hr>
    <pre>
   	if(!empty($_POST["n1"]))
    {
        $a2=1;
        $a1=1;
        $a;
        $n1=$_POST["n1"];
        echo "1->{$a2}<br>";
        echo "2->{$a2}<br>";
        $i=3;
        while($i<=$n1)
        {            
            $i++;
            $a=$a1+$a2;
            $a2=$a1;
            $a1=$a;
            echo "{$i}->{$a}<br>";
        }
    }
    </pre>
</body>
</html>