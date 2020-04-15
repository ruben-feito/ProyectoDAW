<?php

$email=$_SESSION['email'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$metodo_pago=$_SESSION['pago']; 
$total=$_SESSION['total'];

if($email!=""){ //para evitar que cree uno vacio
    introducirPago($email, $telefono, $direccion, $metodo_pago, $total);

    //envio de correo
    $mensaje="Pedido para $direccion está confirmado";
    correo($email, $mensaje);  
}

?>