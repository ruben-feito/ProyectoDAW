<?php

if(!isset($_SESSION['id'])){ //si no existe sesion iniciada
   header("location: ../index.php"); //lanzamos al login
}

session_start();
session_unset();
if(session_destroy()) {
   header('Location: '.$_SERVER['HTTP_REFERER']);
}

?>