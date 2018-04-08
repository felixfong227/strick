<?php
    $ENV = [
        "secret" => "HHXXA6cJgOxjVkdMKQfp", // Defalut server secret keu
    ];
    $token = file_exists("STRICK_TOKEN.php");
    if(!$token){
        $hashed_token = hash('sha384', $ENV["secret"] . bin2hex(openssl_random_pseudo_bytes(10)) );
        $file_content = "<?php \$STRICK_TOKEN = \"$hashed_token\";?>";
        file_put_contents('STRICK_TOKEN.php', $file_content);
        echo "STRICK_TOKEN: $hashed_token <br />";
        echo "Save it somewhere else, becuase it won't show it again. <br />";
        echo "And you will need this access token to perform all kinds of Strick API request. <br />";
        die();
    }else{
        die('STRICK_TOKEN is set!');
    }
?>