<?php 


require 'connection.php';

header("Content-Type: application/json");

// Get full request URL
$url = $_SERVER["REQUEST_URI"];

// Get HTTP request method (GET, POST, PUT, DELETE)
$method = $_SERVER["REQUEST_METHOD"];

// Extract only the path from the URL
$uri = parse_url($url, PHP_URL_PATH);

// Remove "/api" from the URL (example: /api/users → /users)
$uri = str_replace("/BLK05", "", $uri);

// Convert URL into array parts
// Example: /users/5 → ["users", "5"]
$urlParts = explode("/", trim($uri, "/"));


// Check if first part of URL is "users"
if($urlParts[0] == "users"){

    // GET /users
    // Fetch all users

    if($method == "GET" && count($urlParts) == 1){
        require './apis/get.php';

    

    }elseif($method == "GET" && count($urlParts) == 2){
       // GET /users/{id}
    // Fetch single user by ID
    //Assignment

    

    }elseif($method == "POST" && count($urlParts) == 1){
        require './apis/post.php';
        // POST /users
    // Add new user

   

    }elseif(($method == "PUT" || $method == "PATCH") && count($urlParts) == 2){
        $id = $urlParts[1];   // Get user ID from URL parts
        require './apis/update.php';
        // PUT or PATCH /users/{id}
  
 
    }elseif($method == "DELETE" && count($urlParts) == 2){
        $id = $urlParts[1];   // Get user ID from URL parts
        require './apis/delete.php';
          // DELETE /users/{id}
    // Delete user

    // If method does not match
    }else{
        http_response_code(400);
        echo json_encode([
            "status" => "failed",
            "message" => "Invalid Method"
        ]);
    }

}else{
    // If URL is not /users
    http_response_code(400);
    echo json_encode([
        "status" => "failed",
        "message" => "Invalid URL"
    ]);
}

?>