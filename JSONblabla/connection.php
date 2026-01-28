<?php
$serverhost = "localhost"; // MySQL server location
$username = "root";        // MySQL username
$password = "";            // MySQL password

try {
    // Connect to the database using PDO
    $conn = new PDO("mysql:host=$serverhost;dbname=demo", $username, $password);
    
    // Make sure PDO throws errors if something goes wrong
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Database is connected"; // Uncomment to check connection
} 
catch(PDOException $e) {
    // Show error if connection fails
    echo $e->getMessage();
}
?>