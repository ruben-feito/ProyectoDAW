<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
   header("location: ../../"); //lanzamos al login
}

session_start();
session_unset();
if(session_destroy()) {
   header('Location: '.$_SERVER['HTTP_REFERER']);
}

?>