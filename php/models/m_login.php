<?php

//extraccion de login
$_SESSION['email']=$_REQUEST["email"]; //guardamos la sesion con el email
$_SESSION['telefono']=$_REQUEST["telefono"]; //guardamos la sesion con el telefono
$_SESSION['direccion']=$_REQUEST["direccion"]; //guardamos la sesion con la direccion
$_SESSION['cesta']=array(); //guardamos los productos

//buscar sesion con el nombre del email
if(isset($_COOKIE[$_SESSION['email']])){ 
	//deserializar para sacar la informacion
	$_SESSION['cesta']=unserialize($_COOKIE[$_SESSION['email']]); //pasar datos de coockie a cesta
}
else{ //si no existe se crea
	$cookie_name=$_REQUEST["email"];
	$cookie_value=$_SESSION['cesta']; 
	//serializar para meter la informacion
	setcookie($cookie_name, serialize($cookie_value), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
}

header("Refresh:0"); //refrescar
 
?>