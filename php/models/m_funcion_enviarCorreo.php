<?php

//funcion que manda un correo electronico
//parametros -> $subject es email del cliente
//              $message es el mensaje a transmitir
function correo($email, $message){
    $to=$email;
    $subject="El Rincon Del Sin";
    $message=$message;

    mail($to, $subject, $message);
}

?>