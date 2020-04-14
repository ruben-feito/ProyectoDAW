<?php

$email=$_SESSION['email'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$metodo_pago=$_SESSION['pago']; 
$total=$_SESSION['total'];

introducirPago($email, $telefono, $direccion, $metodo_pago, $total);

//envio de correo
$mensaje="Pedido para $direccion está confirmado";
correo($email, $mensaje);

if($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Cerrar Sesion"){
    session_unset();
    header('Location: '.$_SERVER['HTTP_REFERER']);
}

?>