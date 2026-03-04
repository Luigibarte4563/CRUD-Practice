<?php
try {
    if (!isset($id)) {
        http_response_code(400);
        echo json_encode([
            "status" => "failed",
            "message" => "ID is required"
        ]);
        exit;
    }

    if (!is_numeric($id)) {
        http_response_code(400);
        echo json_encode([
            "status" => "failed",
            "message" => "Invalid ID"
        ]);
        exit;
    }
    
    $sql = "SELECT * FROM student_acc WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        http_response_code(404);
        echo json_encode([
            "status" => "failed",
            "message" => "Student not found"
        ]);
    } else {
        http_response_code(200);
        echo json_encode($result);
    }

} catch (PDOException $e) {

    http_response_code(500);
    echo json_encode([
        "status" => "failed",
        "message" => $e->getMessage()
    ]);
}