<?php

//funcion que manda un correo electronico
//parametros -> $subject es email del cliente
//              $message es el mensaje a transmitir
function correo($email, $message){
    $to=$email;
    $subject="El Rincon Del Sin";
    $message=$message;
    $headers='From: elrincondelsin.mail@gmail.com' . "\r\n" .
    'Reply-To: elrincondelsin.mail@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $funciona=mail($to, $subject, $message, $headers);
    if(!$funciona){
        echo "<br>Mail no enviado";
    }
}

?>