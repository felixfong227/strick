<?php
$token = file_exists("../STRICK_TOKEN.php");
if($token){
    include_once("../auth.php");
    include_once("../STRICK_TOKEN.php");
}else{
    header("Location: ../env.php");
}
$actual_link = "http://$_SERVER[HTTP_HOST]";
$ID = hash('crc32', bin2hex(openssl_random_pseudo_bytes(50)));
$target_dir = "../host";
$file = $_FILES["image"];
$ext = pathinfo($file["name"], PATHINFO_EXTENSION);
$new_file_name = $ID . "." . $ext;
// Check the file mime type
if(!getimagesize($file["tmp_name"])){
    header('Content-Type: application/json');
    http_response_code(403);
    die(json_encode([
        "error" => "Incorrect file format, require an image file",
    ]));
}
$action = move_uploaded_file($file["tmp_name"], "../host/$new_file_name");
if($action){
    header('Content-Type: application/json');
    http_response_code(201);
    die(json_encode([
        "ID" => $ID,
        "file_name" => $new_file_name,
        "url" => $actual_link . "view.php?file=$new_file_name",
    ]));
}else{
    header('Content-Type: application/json');
    http_response_code(500);
    die(json_encode([
        "error" => "Sorry, something went wrong while trying upload your assets",
    ]));
}
?>