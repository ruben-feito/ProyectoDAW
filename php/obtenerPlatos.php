<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../"); //lanzamos al login 
}

function obtenerPlatos($conn) {
	$platos=array();
	$sql="SELECT nombre FROM plato";
	$resultado=mysqli_query($conn, $sql);
	if ($resultado) {
		while ($row=mysqli_fetch_assoc($resultado)) {
			$platos[]=$row['nombre'];
		}
	}
	return $platos;
}

?>