<?php
require 'connection.php';
header("Content-Type: application/json");

$id = $_GET['id'] ?? null;

if(empty($id)) {
    echo json_encode([
        "status" => "failed",
        "message" => "ID not found"
    ]);
    exit();
}

try{
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$id]);

    if($stmt->rowCount() == 0) {
        echo json_encode([
            "message" => "Rocord is not found"
        ]);
    }else {
        echo json_encode([
            "status" => "success",
            "message" => "Record is deleted"
        ]);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>