<?php
$serverhost = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$serverhost; dbname=demo", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database is connected";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>