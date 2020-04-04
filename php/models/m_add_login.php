<?php

//extraccion de login
$_SESSION['usuario']=$_REQUEST["usuario"]; //guardamos la sesion con el usuario
$_SESSION['clave']=$_REQUEST["clave"]; //guardamos la sesion con la clave

//recoger valores
$nombre=$_REQUEST['usuario'];
$clave=$_REQUEST['clave'];

//comprobar usuario
$conn=conectarBD();
$valido=comprobar($conn, $nombre, $clave);

// Funciones utilizadas en el programa

//funcion que comrpueba si el usuario es valido
//parametros usuario y clave, devuelve si es valido
function comprobar($conn, $nombre, $clave){

	$valido=true;

	$select="SELECT email, direccion from cliente where email='$nombre' and direccion='$clave'";
    $resultado=mysqli_query($conn, $select);
	$row=mysqli_fetch_assoc($resultado);
	$email=$row['email'];
	$direccion=$row['direccion'];

	if($email!='admin' || $direccion!='admin'){
		$valido=false;
	}

	return $valido;
}

?>