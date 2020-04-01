<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=="Iniciar Sesion" && $_REQUEST["email"]!="" && $_REQUEST["telefono"]!="" && $_REQUEST["direccion"]!="") { //comprobacion de boton de submit correcto

	//llamada a modelo
    require_once("./php/models/m_login.php");
    
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
			<input type="text" name="direccion" pattern="^[a-zA-ZáéíóúÁÉÍÓÚ0-9 \\\/\.\-\ª\º]{3,}$" title="El formato de direccion debe ser válido y de almenos 3 caracteres"></input></br>
		</div>
		<br>
        <input id="disp" class="pedidos" type="submit" name="form" value="Iniciar Sesion"> 
    <form>
    <?php
}

?>