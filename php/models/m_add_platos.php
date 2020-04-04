<?php

//Funcion que llena el array platos
//Parametros: conexion con db
//Devuelve el array
function obtenerPlatos($conn){
    $platos = array();

    $sql = "SELECT id, nombre, precio, tipo FROM plato order by id";
	$resultado = mysqli_query($conn, $sql);
    if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$id=$row['id'];
            $nombre=$row['nombre'];
            $precio=$row['precio'];
            $tipo=$row['tipo'];

			$platos[]=[
                "id"=>$id,
                "nombre"=>$nombre, 
                "precio"=>$precio,  
                "tipo"=>$tipo];
		}
	}
	return $platos;
}

?>