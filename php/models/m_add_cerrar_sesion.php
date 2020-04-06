<?php

if(!isset($_SESSION['admin'])){ //si no existe sesion admin
	header("Location: .././controllers/c_add_login.php/");
}
session_unset();

if(session_destroy()) {
	header("Location: .././controllers/c_add_login.php");
}

?>