<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="get.php" method="GET">
        <label>username</label>
        <input type="text" name="username"><br><br>
        <label>password</label>
        <input type="password" name="password"><br><br> 
        <input type="submit" value="Log in">
    </form>
</body>
</html>

<?php
    echo $_GET["username"] . "<br>"; 
    echo $_GET["password"] . "<br>";
?>