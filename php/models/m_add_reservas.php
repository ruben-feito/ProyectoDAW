<?php

//Funcion que llena el array reservas
//Parametros: conexion con db
//Devuelve el array
function obtenerReservas($conn){
    $reservas = array();

    $sql = "SELECT num_reserva, email, fecha, hora, comensales, fecha_registro FROM reserva order by num_reserva";
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
	return $reservas;
}

?>