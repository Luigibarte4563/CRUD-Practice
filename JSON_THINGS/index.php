<?php
require 'connection.php';
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace("/IntegrativeProgramming/JSON_THINGS", "", $uri);
$urlparts = explode("/", trim($uri, "/"));

if ($urlparts[0] == "test") {
    if ($method == "GET" && count($urlparts) == 1) {
        try {
            $sql = "SELECT * FROM students";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            http_response_code(200);
            echo json_encode($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }elseif ($method == "GET" && count($urlparts) == 2) {
        try {
            $id = $urlparts[1];
            $sql = "SELECT * FROM students WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            http_response_code(200);
            echo json_encode($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else {
    http_response_code(400);

    echo json_encode([
        "status" => "failed",
        "message" => "Invalid URL"
    ]);
}
?>