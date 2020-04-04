<?php
	if(!isset($_SESSION['admin'])){ //si no existe sesion admin
		header("Location: ../../");
	}
?>

<html>
   
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-inicio</title>
    <link rel="stylesheet" href="../.././js/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
    </head>
   
    <body>
    <h1 class="text-center">Opciones de Administrador</h1>

    <!--Botones de la aplicacion-->
    <div class="container ">
        <input type="button" value="Ver Clientes y sus Datos" onclick="window.location.href='c_add_clientes.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="Ver Pedidos y sus Datos" onclick="window.location.href='c_add_pedidos.php'" class="btn btn-warning disabled"><input type="button" value="Pedidos entre fechas" onclick="window.location.href='c_add_pedidos_fechas.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="Ver Platos" onclick="window.location.href='c_add_platos.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="Ver Reservas" onclick="window.location.href='c_add_reservas.php'" class="btn btn-warning disabled"><input type="button" value="Reservas entre fechas" onclick="window.location.href='c_add_reservas_fechas.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="Añadir Platos" onclick="window.location.href='c_add_annadir_platos.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="Eliminar Platos" onclick="window.location.href='c_add_eliminar_platos.php'" class="btn btn-warning disabled"></br></br>
        <input type="button" value="CERRAR SESION" onclick="window.location.href='.././models/m_add_cerrar_sesion.php'" class="btn btn-warning disabled" id="cerrarSesion">
    </div>
    
    <img src="../.././img/banner_web.jpg">

</body>
</html>