<?php
function recaptcha($respuesta) {
    
    //Tu clave secretra de recaptcha
    $clavesecreta='6Lco6jgUAAAAAEYCvI07KxXABJKc4Y_gd17S8M6t';
    //La url preparada para enviar
    $urlrecaptcha="https://www.google.com/recaptcha/api/siteverify?secret=$clavesecreta&response=$respuesta";

    //Leemos la respuesta (suele funcionar solo en remoto)
    $respuesta = file_get_contents($urlrecaptcha) ;

    //Comprobamos el success
    $dividir=explode('"success":',$respuesta);
    $obtener=explode(',',$dividir[1]);

    //Obtenemos el estado
    $estado=trim($obtener[0]);

    return $estado; 
}
?>