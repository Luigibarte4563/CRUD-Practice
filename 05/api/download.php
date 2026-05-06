<?php 
if($id){
try{
$sql="SELECT * FROM files WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->execute([
    $id
]);
$result=$stmt->fetch(PDO::FETCH_ASSOC);
if($result){
    $path="uploads/".$result["filename"];
    if(file_exists($path)){

    $lastMod=filemtime($path);
    $etag=md5_file($path);
    if(isset($_SERVER["HTTP_IF_NONE_MATCH"]) && $_SERVER["HTTP_IF_NONE_MATCH"] == $etag){
        header("HTTP/1.1 Not Modified");
        exit();
    }
    if(isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) && $_SERVER["HTTP_IF_MODIFIED_SINCE"] >= $lastMod){
          header("HTTP/1.1 Not Modified");
        exit();
    }

    header("Cache-Control: public, max-age=86400");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s", $lastMod) . " GMT");
    header("ETag: $etag");

    

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=".basename($result['origname']));
    header("Content-Length: ".filesize($path));
    readfile($path);
    }
}
else{
    echo json_encode(
       [
         "status"=>"failed",
        "message"=>"No file found"
       ]
    );
}
}
catch(PDOException $e){
    echo json_encode([
        "status"=>"failed",
        "message"=>$e->getMessage()
    ]);
}
}
else{
    echo json_encode(["status"=>"failed","message"=>"Missing ID"]);
}





?>