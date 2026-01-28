<?php
$serverhost = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql: host=$serverhost; dbname=demo", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "database is connected";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>