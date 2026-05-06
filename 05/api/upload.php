<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_FILES["file_upload"])){
    $file=$_FILES["file_upload"];
    $name=$file["name"];//original name
    $size=$file["size"];
    $error=$file["error"];
    $tmp=$file["tmp_name"];
    $category="";
    if($error==UPLOAD_ERR_OK){

    $dir="uploads";
        if(!is_dir($dir)){
        mkdir($dir,0777,true);        
        }
        //5mb
        if($size> 5 * 1024 *1024){
            echo json_encode([
                "status"=>"failed",
                "message"=>"File exceeding limit(MAX:5MB)"
            ]);
            exit();
        }

        $allowed=["pdf","docx","xlsx","pptx"];
        $ext=strtolower(pathinfo($name,PATHINFO_EXTENSION));

        if(!in_array($ext,$allowed)){
            echo json_encode([
                "status"=>"failed",
                "message"=>"Extension not allowed"
            ]); 
            exit(); 
        }
        if($ext=="pdf"){
            $category="pdf";
        }elseif($ext=="docx"){
            $category="docx";
        }elseif($ext=="xlsx"){
            $category="excel";
        }
        elseif($ext=="pptx"){
            $category="ppt";
        }


    $filename=time()."_".$name;
    $destination=$dir. DIRECTORY_SEPARATOR . $filename;

if(move_uploaded_file($tmp,$destination)){
    try{
        $sql="INSERT INTO files(origname,filename,category) VALUES(?,?,?)";
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            $name,$filename,$category
        ]);

        echo json_encode([
            "status"=>"success",
            "message"=>"File is uploaded successfully"
        ]);

    }
catch(PDOException $e){
    echo json_encode([
        "status"=>"failed",
        "message"=>$e->getMessage()
    ]);
}

}

    }else{
        echo json_encode([
            "status"=>"failed",
            "message"=>"Error while uploading file"
        ]);
    }


}
else{
    echo json_encode([
        "status"=>"failed",
        "message"=>"Invalid method or Missing file"
    ]);
}





?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  