<?php

if(!isset($_SESSION['id'])){ //si no existe sesion iniciada
    header("location: ../"); //lanzamos al login
}

$plato=$_REQUEST["plato"]; //el del selector

$unidades=$_REQUEST["unidades"];

//buscar id producto y cantidad
$sql="SELECT id FROM plato WHERE nombre='$plato'";
$resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
$row=mysqli_fetch_assoc($resultado);
$id=$row['id'];

//hacer que sumen las unidades
if(!empty($_SESSION['cesta'][$id])){ //no deben de estar vacios al principio
    $unidades=$_SESSION['cesta'][$id]+(int)$unidades;
    setcookie($_SESSION['id'], serialize($_SESSION['cesta']), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
}

//guardarlo en el array asotiativo
$_SESSION['cesta'][$id]=(int)$unidades;
setcookie($_SESSION['id'], serialize($_SESSION['cesta']), time() + (86400 * 30), "/"); // 86400 segundos = 1 día

if(!empty($_SESSION['cesta'][$id]) && $_SESSION['cesta'][$id]<=0){ 
    //si las unidades son <=0 borrarlo de la cesta
    unset($_SESSION['cesta'][$id]);
    setcookie($_SESSION['id'], serialize($_SESSION['cesta']), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
}

header("Refresh:0"); //refrescar los cambios

?>