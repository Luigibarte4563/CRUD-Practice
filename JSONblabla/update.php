<?php
require 'connection.php'; // Connect to the database
header("Content-Type: application/json"); // Send JSON response

// Get ID from URL
$id = $_GET['id'] ?? null;

// Check if ID is provided
if(empty($id)){
    echo json_encode([
        "status" => "failed",
        "message" => "ID not found"
    ]);
    exit(); // Stop the script
}

// Get data from JSON input
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'] ?? null;
$age = $data['age'] ?? null;
$program = $data['program'] ?? null;

try {
    // Prepare SQL to update record, only change fields that are not null
    $sql = "UPDATE students 
            SET name = COALESCE(?, name), 
                age = COALESCE(?, age), 
                program = COALESCE(?, program) 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Execute the update
    $stmt->execute([
        $name,
        $age,
        $program,
        $id
    ]);

    // Check if the record is existed in database
    if($stmt->rowCount() == 0){
        echo json_encode([
            "status" => "success",
            "message" => "Record is not found"
        ]);
        exit();
    } else {
        echo json_encode([
            "status" => "success",
            "message" => "Record is updated"
        ]);
    }
} 
catch(PDOException $e){
    // Show error if something goes wrong
    echo $e->getMessage();
}
?>