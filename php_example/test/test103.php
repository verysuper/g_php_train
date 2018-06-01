<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    $name=$_GET['name'];
    $email=$_GET['email'];

    echo "姓名：$name<br>";
	echo "E-Mail：$email<br>";
?>
<body>
    <form action="test103.php" method="get">
        姓名<input type="text" name="name" id=""><br>
        email<input type="text" name="email" id=""><br>
        <input type="submit" value="送出" name="submit" id="submit">
    </form>
</body>
</html>