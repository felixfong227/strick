<?php
$file = $_GET["file"];
if(!$file || !file_exists("host/$file")){
    header('Content-Type: application/json');
    http_response_code(403);
    die(json_encode([
        "error" => "Forbidden",
    ]));
}
$mime_type = mime_content_type("host/$file");
require("lib/SimpleImage.php");
$image = new \claviska\SimpleImage();
$raw_width = $_GET["width"];
$raw_height = $_GET["height"];
if($raw_width && !$raw_height){
    $raw_height = $raw_width;
}

if($raw_height && !$raw_width){
    $raw_width = $raw_height;
}

if(!$raw_width && !$raw_height){
    $raw_width = $image->getWidth();
    $raw_height = $image->getHeight();
}
header('Pragma: public');
header("Cache-Control: max-age=31536000, public");
header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
header('Content-Description: File Transfer');
$image
->fromFile("host/$file")
->resize($raw_width, $raw_height)
->toScreen()
?>