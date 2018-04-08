<?php
$token = $_GET["token"];
include_once("../STRICK_TOKEN.php");
if($STRICK_TOKEN !== $token){
    header('Content-Type: application/json');
    http_response_code(401);
    die(json_encode([
        "error" => "Incorrect Strick access token",
    ]));
}
?>