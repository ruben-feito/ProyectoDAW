<?php
	session_start();
	
	if(!isset($_SESSION['email'])){ //si no existe sesion admin
		header("Location: ../../");
	}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>El Rinc&oacute;n del "Sin"</title>
		<meta charset="UTF-8"/>
		<meta name="author" content="Rubén Feito Alberto Jimenez y Jesús Mateos">
		<link rel="icon" href="./img/logo2.png"/> <!--Fab Icon -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viweport-->
		<link rel="StyleSheet" media="only screen and (max-device-width:760px)" href="../../css/stylesheet-movil.css" type="text/css">
		<link rel="StyleSheet" media="only screen and (min-device-width:761px) and (max-device-width:1024px)" href="../../css/stylesheet-tablet.css" type="text/css"/>
		<link rel="StyleSheet" media="only screen and (min-device-width:1025px)" href="../../css/stylesheet-pc.css" type="text/css"/>
    </head>
	<body>
		<header>
			<div id="banner"><img src="../../img/banner_web.jpg" alt="Imagen con logotipo"></div>
		</header>
		<nav>
			<menu class="menu" class="fixed">
				<input id="menu-responsivo" type="checkbox">
				<label for="menu-responsivo">Menú<span id="menu-icon"></span><div class="logo"><img src="./img/logo.png" alt="Imagen del logotipo"></div></label>
				<div id="overlay"></div>
				<ul onclick="cerrarMenu()">
					<li><a class="enlace_desactivado">INICIO</a></li>
					<li><a class="enlace_desactivado" id="current">COMIDAS</a></li>
					<li><a class="enlace_desactivado" id="current" >CARTA</a>
					<li><a class="enlace_desactivado" id="current" >PEDIDOS</a>
					<li><a class="enlace_desactivado" id="current">RESERVAS</a>
					<li><a class="enlace_desactivado" id="current">CONTACTO</a>
				</ul>
				</br></br>
			</menu>
		</nav>
        <main>
            <article id="pedidos">
				<div>
					<div><h2>PEDIDOS</h2></div>
					<div id="formulario_pedido">
						<p><span>Existi&oacute; algun problema con el pago</span></p>
						<form method="POST" action="" target="">
							<input id="disp" class="pedidos" type="submit" name="form" value="Volver">
						</form>
					</div>
				</div>
            </article>
        </main>
    </body>
</html>
<?php
//llamada a modelo
require_once("../models/m_tarjetaFracaso.php");
	
?>