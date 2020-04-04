<?php
	session_start();
	include "./php/db/db_conexion.php";
	ob_start(); //Activa el almacenamiento en búfer de la salida para poder hacer headers y setcookie
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>El Rinc&oacute;n del "Sin"</title>
		<meta charset="UTF-8"/>
		<meta name="author" content="Rubén Feito Alberto Jimenez y Jesús Mateos">
		<link rel="icon" href="./img/logo2.png"/> <!--Fab Icon -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--viweport-->
		<link rel="StyleSheet" media="only screen and (max-device-width:760px)" href="./css/stylesheet-movil.css" type="text/css">
		<link rel="StyleSheet" media="only screen and (min-device-width:761px) and (max-device-width:1024px)" href="./css/stylesheet-tablet.css" type="text/css"/>
		<link rel="StyleSheet" media="only screen and (min-device-width:1025px)" href="./css/stylesheet-pc.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="./js/jquery3.4.1min.js"></script>
		<script src="./js/posicionarMenu.js"></script>
		<script src="./Js/cerrarMenu.js"></script>
		<script src="./js/slider.js"></script>     
		<script src="./js/pedidos-reservas.js"></script>     
		<script src="./js/ajax_platos.js"></script>     
		<script src="./js/tarjeta.js"></script>     
	</head>
	<body>
		<header>
			<div id="banner"><img src="./img/banner_web.jpg" alt="Imagen con logotipo"></div>
		</header>
		<nav>
			<menu class="menu" class="fixed">
				<input id="menu-responsivo" type="checkbox">
				<label for="menu-responsivo">Menú<span id="menu-icon"></span><div class="logo"><img src="./img/logo.png" alt="Imagen del logotipo"></div></label>
				<div id="overlay"></div>
				<ul onclick="cerrarMenu()">
					<li><a href="#">INICIO</a></li>
					<li><a href="#comidas" id="current">COMIDAS</a></li>
					<li><a href="#carta" id="current" >CARTA</a>
					<li><a href="#pedidos" id="current" >PEDIDOS</a>
					<li><a href="#reservas" id="current">RESERVAS</a>
					<li><a href="#contacto" id="current">CONTACTO</a>
				</ul>
				</br></br>
			</menu>
		</nav>
		<main>
			<section class="wrapper">
				<article id="quienes">
					<div>
					<p>Restaurante El Rinc&oacute;n del "Sin"</p><br>
					<p>Creado por un equipo de emprendedoras, <span>El Rinc&oacute;n del “Sin”</span> fue inaugurado el 01 de febrero de 2019, con la intenci&oacute;n de ofrecer la mejor gastronom&iacute;a libre de gluten. Nuestro objetivo fue crear un restaurante en donde las personas puedan disfrutar de una variedad de platos exquisitos, donde gana valor la calidad de nuestras materias primas y haciendo de quien prueba nuestros platos una experiencia inolvidable.</p>
					<br>
					<p><span>El Rinc&oacute;n del “Sin”</span> es mucho m&aacute;s que un buen restaurante, queremos que os sint&aacute;is como en vuestra casa.</p></br>
					<p>Ready to eat.</p>
					</div>
				</article>
				<article id="comidas">
					<div>
						<h2>COMIDAS</h2>
						<div id="slider">
							<a class="control_next">></a>
							<a class="control_prev"><</a>
							<ul class="slider">
								<li><img src="./img/platos/lechal.jpg" alt="Plato de Cordero Lechal"></li>
								<li><img src="./img/platos/calamares_romana.jpg" alt="Plato de Calamares a la Romana"></li>
								<li><img src="./img/platos/secreto.jpg" alt="Plato de Secreto"></li>
								<li><img src="./img/platos/ensalada_de_ventresca.jpg"></li>
								<li><img src="./img/platos/tarta_queso.jpg" alt="Plato de Tarta de queso"></li>
								<li><img src="./img/platos/pollo_enrollado.jpg" alt="Plato de Rulo de Pollo"></li>
								<li><img src="./img/platos/merluza_bilbaina.jpg" alt="Plato de Merluza a la Bilbaina"></li>
							</ul>
						</div>
						<div class="texto">
							<p>Ambiente agradable y para sentirse como en casa. Siempre buscando la medida exacta entre la gastronom&iacute;a de m&aacute;s alta calidad con rincones apetecibles y de largas estancias.</p>
							<p>Gracias al <em>savoir-faire</em> y a nuestro inter&eacute;s y dedicaci&oacute;n por la cocina, hacen de nuestro restaurante un lugar &uacute;nico, donde podr&aacute; encontrar todo tipo de sabores.</p>
						</div>
					</div>
				</article>
				<div id="local"><img src="./img/local.jpg" alt="Mesas del local antes del servicio, vista lejana"></div>
				<article id="carta">
					<div id="mesas"><img src="./img/mesas.jpg" alt="Mesas del local antes del servicio, vista cercana"></div>
					<h2>CARTA</h2>
					<div class="texto">
						<p>Las materias primas sin gluten de primera calidad, que componen nuestros exquisitos platos elaborados con dedicaci&oacute;n por nuestra chef, hacen de nuestro restaurante un lugar &uacute;nico para disfrutar del buen sabor de la comida.</p>
						<p>Para un picoteo en barra y perfecto para el aperitivo, se ofrecen pinchos y raciones para compartir, como una de las mejores opciones para comer de manera informal.</p>
					 	</br>
						<div><a href="Carta_Actualizada.pdf" target="_blank">Ver Carta</a></div>
					</div>
				</article>
				<article id="pedidos">  
					<div>
						<div><h2>PEDIDOS</h2></div>
						<div id="formulario_pedido">
							<p><span>Pedidos El Rincon Del "Sin"</span></p>
							<?php
								$email = $telefono = $direccion = null; //declaracion de variables
								require_once("./php/controllers/c_indice.php");
							?>
						</div>
					</div>
					</article>
				<article id="reservas">
					<div>
						<div><h2>RESERVAS</h2></div>
						<div id="formulario">
							<p><span>Reservas El Rincon Del "Sin"</span></p>
							<?php
								$comensales = $fecha = $hora = $email = null; //declaracion de variables
								$disponibilidad=false;
								require_once("./php/controllers/c_disponibilidad.php");
								require_once("./php/controllers/c_reserva.php");
							?>
						</div>
					</div>	
				</article>
				<article id="contacto">
					<h2>CONTACTO</h2>
					<div id="mapa">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.2817593893365!2d-3.714136636556298!3d40.42475947769493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42286f9ab5997b%3A0x6ab5d66dff0343db!2sCalle%20de%20Mart%C3%ADn%20de%20los%20Heros%2C%2014%2C%2028008%20Madrid!5e0!3m2!1ses!2ses!4v1576162567428!5m2!1ses!2ses"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
					<div class="texto">	
						<p>El Rincon del "Sin"</p>
						<p>C/ de Mart&iacute;n de los Heros, 14 – 28008 Madrid</p>
						<p>Tel&eacute;fono: <a href="tel:91 345 58 59" itemprop="telephone">91 345 58 59</a></p>
						<p>E-mail: <a href="mailto:elrincondelsin@gmail.com">elrincondelsin@gmail.com</a></p>
						</br>
						<p>Lunes a Jueves 12:00h a 00:00h</p>
						<p>Viernes de 12:00h a 1:00h</p>
						<p>S&aacute;bados de 12:00h a 2:00h</p>
						<p>Domingos de 12:00h a 0:30h</p>
						<p>Viernes, s&aacute;bados y v&iacute;spera de festivos 12:00h a 3:00h</p>
						</br>
						<p>Abrimos todos los Domingos y Festivos</p>
					</div>
				</article>
				<article id="comentarios">
					<div id="slider2">
						<div>
							<img src="./img/opiniones/opinion1.jpg" alt="Opinion: Buena Calidad, interesa reservar, bien atendidos la comida es de la zona y tiene también cosas originales">
							<img src="./img/opiniones/opinion2.jpg" alt="Opinion: Se come espectacular, y el servicio excelente! Recomendamos 100% Sin duda repetiremos muy Pronto!!!!!!">
							<img src="./img/opiniones/opinion3.jpg" alt="Opinion: Restaurante con calidad en sus platos, no nos defraudó buen trato de los camareros, amabilidad y comida excelente.">
							<img src="./img/opiniones/opinion4.jpg" alt="Opinion: Restaurante con buena cocina y servicio. Los Platos son elaborados y novedosos. Muy buenas las croquetas y excelente el bacalao">
							<img src="./img/opiniones/opinion1.jpg" alt="Opinion: Buena Calidad, interesa reservar, bien atendidos la comida es de la zona y tiene también cosas originales">
						</div>
					</div>
				</article>
				<div class="push"></div>
				<img id="prefooter" src="./img/logo.png" alt="Logotipo">
			</br></br></br>
			</section>
		</main>
		<aside>
		</aside>
	    </br>
		<footer class="footer">
			<div>
				<div id="face"><a href="https://www.facebook.com/" target="_blank"><img src="img/icono_facebook.png" alt="Logotipo FaceBook"></a></div>
				<div id="insta"><a href="https://www.instagram.com/" target="_blank"><img src="img/icono_instagram.png" alt="Logotipo Instagram"></a></div>
				<div id="trip"><a href="https://www.tripadvisor.es/" target="_blank"><img src="img/icono_tripadvisor.png" alt="Logotipo TripAdvisor"></a></div>
			</div>
		</footer>
	</body>	 
</html>	

<?php
	ob_end_flush(); // enviar el búfer de salida
?>