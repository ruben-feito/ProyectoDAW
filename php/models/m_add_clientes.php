<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: ../../admin.php");
}

//Funcion que llena el array clientes
//Parametros: conexion con db
//Devuelve el array
function obtenerClientes($conn){
    $clientes = array();

    $sql = "SELECT email, telefono, direccion, ultimo_registro FROM cliente where email!='admin' order by email";
	$resultado = mysqli_query($conn, $sql);
    if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$email=$row['email'];
            $telefono=$row['telefono'];
            $direccion=$row['direccion'];
            $ultimo_registro=$row['ultimo_registro'];

			$clientes[]=[
                "email"=>$email,
                "telefono"=>$telefono, 
                "direccion"=>$direccion,  
				"ultimo_registro"=>$ultimo_registro];
		}
	}
	return $clientes;
}

?>