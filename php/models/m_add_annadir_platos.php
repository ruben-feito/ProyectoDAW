<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: ../../");
}

//Recoger informacion del formulario
$nombre=$_REQUEST['nombre'];
$precio=$_REQUEST['precio'];
$tipo=$_REQUEST['tipo'];

//seleccionar id maximo para no repetirlo
$sql = "SELECT max(id) as maximo FROM plato";
$resultado = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($resultado);
if ($resultado){
    $maxId=$row['maximo']+1; //+1 para el nuevo plato
}

//inserccion en la vase de datos
$sql="INSERT INTO plato (id, nombre, precio, tipo) VALUES ('$maxId', '$nombre', '$precio', '$tipo')";
if(!mysqli_query($conn, $sql)){
    echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
}

?>