<?php
require 'connection.php'; // Connect to the database
header("Content-Type: application/json"); // Send JSON response

try {
    // Prepare SQL to get all students
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Get all results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if there are any records
    if($stmt->rowCount() == 0){
        echo json_encode([
            "message" => "No record"
        ]);
    } else {
        // Send the records as JSON
        echo json_encode($results);
    }
} 
catch(PDOException $e) {
    // Show error if something goes wrong
    echo $e->getMessage();
}
?>