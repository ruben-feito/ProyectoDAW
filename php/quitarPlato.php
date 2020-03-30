<?php
session_start();

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../"); //lanzamos al login
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="X") { //comprobacion de request_method para el submit

    $id=$_REQUEST["plato_eliminar"]; //el plato a quitar
	echo $id;
    unset($_SESSION['cesta'][$id]);

     header("location: ../#pedidos");  
}

?>