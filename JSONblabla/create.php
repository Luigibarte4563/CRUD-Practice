<?php
require 'connection.php'; // Connect to the database

header("Content-Type: application/json"); // Tell browser we are sending JSON

// Get the JSON data sent from the client
$data = json_decode(file_get_contents("php://input"), true);

// Get values from JSON or set to null if not provided
$name = $data['name'] ?? null;
$age = $data['age'] ?? null;
$program = $data['program'] ?? null;

// Check if any field is empty
if(empty($name) || empty($age) || empty($program)){
    http_response_code(400); // Bad request
    echo json_encode([
        "status" => "failed",
        "message" => "All fields are required"
    ]);
    exit(); // Stop the script
}

try {
    // Prepare SQL to insert data safely
    $sql = "INSERT INTO students(name, age, program) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Execute the query with the data
    $stmt->execute([
        $name,
        $age,
        $program
    ]);

    // Send success response
    echo json_encode([
        "status" => "success",
        "message" => "Record is added"
    ]);
} 
catch(PDOException $e) {
    // Show error if something goes wrong
    echo $e->getMessage();
}
?>