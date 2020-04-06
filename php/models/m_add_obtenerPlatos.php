<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: .././controllers/c_add_login.php/");
}

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