<?php
function recaptcha($response) {
    
    //Your secret key
    $secret='6Lco6jgUAAAAAEYCvI07KxXABJKc4Y_gd17S8M6t';

    $urlrecaptcha="https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response";

    $response = file_get_contents($urlrecaptcha) ;

    $divide=explode('"success":',$response);
    $obtain=explode(',',$divide[1]);

    $status=trim($obtain[0]);

    return $status; 
}
?>