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


$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'] ?? null;
$age = $data['age'] ?? null;
$program = $data['program'] ?? null;

try {
    $sql = "UPDATE students
            SET name = COALESCE(?, name),
                age = COALESCE(?, age),
                program = COALESCE(?, program)
            WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $name,
        $age,
        $program,
        $id
    ]);

    if($stmt->rowCount() == 0) {
        echo json_encode([
            "status" => "failed",
            "message" => "Record is not found"
        ]);
    } else {
        echo json_encode([
            "status" => "success",
            "message" => "Record is updated"
        ]);
    }
} catch (PDOExecption $e) {
    echo $e->getMessage();
}
?>