<?php
$token = file_exists("../STRICK_TOKEN.php");
if($token){
    include_once("../auth.php");
    include_once("../STRICK_TOKEN.php");
}else{
    header("Location: ../env.php");
}
$filename = $_POST["filename"];
if(file_exists("../host/$filename")){
    unlink("../host/$filename");
    header('Content-Type: application/json');
    http_response_code(200);
    die(json_encode([
        "success" => true,
    ]));
}else{
    header('Content-Type: application/json');
    http_response_code(403);
    die(json_encode([
        "error" => "File does not exists",
    ])); 
}
?>