<?php

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