<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: .././controllers/c_add_login.php/");
}

//Seleccionar el id del plato a eliminar
$sql = "SELECT id FROM plato where nombre='$nombrePlato'";
$resultado = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($resultado);
if ($resultado){
    $id=$row['id'];
}

//eliminar plato
$sql="DELETE FROM plato WHERE id=$id";
if(!mysqli_query($conn, $sql)){
    echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
}

?>