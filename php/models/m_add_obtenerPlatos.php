<?php

//Funcion que llena el array platos
//Parametros: conexion con db
//Devuelve el array
function obtenerPlatos($conn){
    $platos = array();

    $sql = "SELECT nombre FROM plato";
	$resultado = mysqli_query($conn, $sql);
    if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$nombre=$row['nombre'];
			
			$platos[]=$nombre;
		}
	}
	return $platos;
}

?>