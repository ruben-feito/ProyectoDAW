<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../../"); //lanzamos al login
}

$email=$_SESSION['email'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$metodo_pago=$_REQUEST['pago']; 
$total=$_SESSION['total'];

$_SESSION['pago']=$metodo_pago;

if($metodo_pago=="efectivo"){

    introducirPago($email, $telefono, $direccion, $metodo_pago, $total);
    
    //envio de correo
    $mensaje="Pedido para $direccion está confirmado";
    correo($email, $mensaje);
}
else if($metodo_pago=="tarjeta"){

    require_once("m_pagoTarjeta.php"); //sistema redsys
}



?>