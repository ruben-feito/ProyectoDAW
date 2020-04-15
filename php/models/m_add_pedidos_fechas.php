<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: ../../admin.php");
}

//Recogida de datos del formulario
$fechaDesde=strtotime($_REQUEST["fechaDesde"]);
$fechaDesde=date("Y-m-d", $fechaDesde);

$fechaHasta=strtotime($_REQUEST["fechaHasta"]);
$fechaHasta=date("Y-m-d", $fechaHasta);

$pedidos = array();

//Seleccionar los pedidos
$sql = "SELECT num_pedido, email, metodo_pago, total, fecha_registro FROM pedido where DATE_FORMAT(fecha_registro,'%Y-%m-%d')>='$fechaDesde' AND DATE_FORMAT(fecha_registro,'%Y-%m-%d')<='$fechaHasta' order by num_pedido";
$resultado = mysqli_query($conn, $sql);
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $num_pedido=$row['num_pedido'];
        $email=$row['email'];
        $metodo_pago=$row['metodo_pago'];
        $total=$row['total'];
        $fecha_registro=$row['fecha_registro'];

        $pedidos[]=[
            "num_pedido"=>$num_pedido,
            "email"=>$email, 
            "metodo_pago"=>$metodo_pago,  
            "total"=>$total,
            "fecha_registro"=>$fecha_registro];
    }
}

?>

