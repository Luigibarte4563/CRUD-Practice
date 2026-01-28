<?php
require 'connection.php';
header("Content-Type: application/json");

try {
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($stmt->rowCount() == 0) {
        echo json_encode([
            "message" => "no record found"
        ]);
    }else {
        echo json_encode($results);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>