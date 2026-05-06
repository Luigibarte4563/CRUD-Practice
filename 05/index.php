<?php
require 'connection.php';
// header("Content-Type: application/json");
$method=$_SERVER["REQUEST_METHOD"];
$url=$_SERVER["REQUEST_URI"];

$uri=parse_url($url,PHP_URL_PATH);
$uri=str_replace("04api","",$uri);

$urlParts=explode("/",trim($uri,"/"));

if($urlParts[0]=="files"){
    if($method=="POST" && count($urlParts)==1){
        require './api/upload.php';
    }elseif($method=="GET" && count($urlParts)==2){
    
    $id=$urlParts[1];
    require './api/download.php';
}
elseif($method=="GET" && count($urlParts)==1){
    require './api/view.php';
}
}
else{
    echo json_encode([
        "status"=>"failed",
        "message"=>"Invalid URL"
    ]);
}

?>