<?php
require 'connection.php'; // Connect to the database
header("Content-Type: application/json"); // Tell browser we return JSON

// Get the ID from URL
$id = $_GET['id'] ?? null;

// Check if ID is provided
if(empty($id)){
    echo json_encode([
        "status" => "failed",
        "message" => "ID not found"
    ]);
    exit(); // Stop the script
}

try {
    // Prepare SQL to delete the record safely
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute([$id]);

    // Check if record is existed in database
    if($stmt->rowCount() == 0){
        echo json_encode([
            "message" => "Record is not found"
        ]);
    } else {
        echo json_encode([
            "status" => "success",
            "message" => "Record is deleted"
        ]);   
    }
} 
catch(PDOException $e) {
    // Show error if something goes wrong
    echo $e->getMessage();
}
?>