<?php
header('Content-Type: application/json');
http_response_code(403);
die(json_encode([
    "error" => "Forbidden",
]));
?>