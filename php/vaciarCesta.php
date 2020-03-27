<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location: ../"); 
}

$_SESSION['cesta']=array(); //vaciamos

header("location: ../#pedidos"); 

?>