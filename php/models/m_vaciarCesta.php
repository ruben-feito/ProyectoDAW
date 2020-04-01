<?php
session_start();

if(!isset($_SESSION['email'])){
    header("location: ../../"); 
}

$_SESSION['cesta']=array(); //vaciamos

header("location: ../../#pedidos"); 

?>