<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=demo1", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "failed",
        "message" => $e->getMessage()
    ]);
}

?>