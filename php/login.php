<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=="Iniciar Sesion" && $_REQUEST["email"]!="" && $_REQUEST["telefono"]!="" && $_REQUEST["direccion"]!="") { //comprobacion de boton de submit correcto

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
		$cookie_name=$email;
		$cookie_value=$_SESSION['cesta']; 
		//serializar para meter la informacion
		setcookie($cookie_name, serialize($cookie_value), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
	}

	header("Refresh:0"); //refrescar
    
}
else{ //muestra el formulario sin pulsar submit
    ?>
    <form method="POST" action="" target="">
		<div id="login">
			<p>Email:</p>
			<input type="email" name="email" pattern="^([a-zA-Z0-9_\\.\\-]+)@([a-zA-Z0-9_\\.\\-]+)\.([a-zA-Z\\.]{2,6})$" title="Debe ser un correo valido"></input></br>
			<p>Tel&eacute;fono:</p>
			<input type="tel" name="telefono" pattern="^[6789][0-9]{8}$" title="Debe empezar por 6, 7, 8 o 9 y ser de 9 digitos"></input></br>
			<p>Direcci&oacute;n:</p>
			<input type="text" name="direccion" pattern="^[a-zA-Z\\d ]{3,}$" title="El formato debe ser válido"></input></br>
		</div>
		<br>
        <input id="disp" class="pedidos" type="submit" name="form" value="Iniciar Sesion"> 
    <form>
    <?php
}