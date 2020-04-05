<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: ../../");
}

//Recogida de datos del formulario y tratado de fechas
$fechaDesde=strtotime($_REQUEST["fechaDesde"]);
$fechaDesde=date("Y-m-d", $fechaDesde);

$fechaHasta=strtotime($_REQUEST["fechaHasta"]);
$fechaHasta=date("Y-m-d", $fechaHasta);

$reservas = array();

//Selecion de datos
$sql = "SELECT num_reserva, email, fecha, hora, comensales, fecha_registro FROM reserva where DATE_FORMAT(fecha_registro,'%Y-%m-%d')>='$fechaDesde' AND DATE_FORMAT(fecha_registro,'%Y-%m-%d')<='$fechaHasta' order by num_reserva";
$resultado = mysqli_query($conn, $sql);
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $num_reserva=$row['num_reserva'];
        $email=$row['email'];
        $fecha=$row['fecha'];
        $hora=$row['hora'];
        $comensales=$row['comensales'];
        $fecha_registro=$row['fecha_registro'];

        $reservas[]=[
            "num_reserva"=>$num_reserva,
            "email"=>$email, 
            "fecha"=>$fecha,
            "hora"=>$hora,
            "comensales"=>$comensales,  
            "fecha_registro"=>$fecha_registro];
    }
}

?>

