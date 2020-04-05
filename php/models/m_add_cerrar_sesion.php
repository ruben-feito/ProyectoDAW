<?php
	session_start();
	if(!isset($_SESSION['admin'])){ //si no existe sesion admin
		header("Location: ../../");
	}
	session_unset();
   
	if(session_destroy()) {
		header("Location: .././controllers/c_add_login.php");
	}
?>