<?php

  session_start();
  include "./php/db/db_conexion.php";

// Llamada al controlador
if(isset($_SESSION['admin'])){ //si existe sesion iniciada
    header("Location: ./php/controllers/c_add_inicio.php");
}
else{
    header("Location: ./php/controllers/c_add_login.php");
}

?>