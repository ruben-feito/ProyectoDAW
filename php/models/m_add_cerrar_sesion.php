<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: ../../admin.php");
}
session_start();
session_unset();

if(session_destroy()) {
	header("Location: ../../admin.php");
}

?>