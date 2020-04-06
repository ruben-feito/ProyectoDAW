<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: .././controllers/c_add_login.php/");
}

//Funcion que llena el array pedidos
//Parametros: conexion con db
//Devuelve el array
function obtenerPedidos($conn){
    $pedidos = array();

    $sql = "SELECT num_pedido, email, metodo_pago, tarjeta, fecha_registro FROM pedido order by num_pedido";
	$resultado = mysqli_query($conn, $sql);
    if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$num_pedido=$row['num_pedido'];
            $email=$row['email'];
            $metodo_pago=$row['metodo_pago'];
            $tarjeta=$row['tarjeta'];
            $fecha_registro=$row['fecha_registro'];

			$pedidos[]=[
                "num_pedido"=>$num_pedido,
                "email"=>$email, 
                "metodo_pago"=>$metodo_pago,  
                "tarjeta"=>$tarjeta,
                "fecha_registro"=>$fecha_registro];
		}
	}
	return $pedidos;
}

?>