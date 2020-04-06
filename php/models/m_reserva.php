<?php

$fecha=$_REQUEST["fecha"]; //en un campo hidden para poder pasarlo entre formularios

$hora=$_REQUEST["hora"]; //en un campo hidden para poder pasarlo entre formularios

$comensales=$_REQUEST["comensales"]; //en un campo hidden para poder pasarlo entre formularios

$email=strtolower($_REQUEST["email"]); //el del formulario

$telefono=$_REQUEST["telefono"]; //el del formulario

reservar($comensales, $fecha, $hora, $email, $telefono);

/*
//NO FUNCIONA, CLOUDING.IO TIENE CAPADO SMTP
//envio de correo
$mensaje="Reserva para dia $fecha $hora con $comensales comensal/es está confirmada";
correo($email, $mensaje);
*/

?>