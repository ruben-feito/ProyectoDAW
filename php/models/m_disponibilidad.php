<?php

//extraccion de reserva
$comensales=$_REQUEST["comensales"];

$fecha=strtotime($_REQUEST["fecha"]);
$fecha=date("Y-m-d", $fecha);

$fecha_actual=date("Y-m-d"); //fecha automatica, la actual

$hora_actual=date("H:i:s"); //fecha automatica, la actual

$hora=strtotime($_REQUEST["hora"]);
$hora=date("H:i:s", $hora);

//si se puede hacer la reserva
if($fecha>=$fecha_actual && $fecha!="1970-01-01" && disponibilidad($comensales, $fecha, $hora)){ //solo comprobar fecha
    $disponibilidad=true;
    if($fecha==$fecha_actual && $hora<$hora_actual){ //a misma fecha comprobar hora
        $disponibilidad=false;
    }
}

?>