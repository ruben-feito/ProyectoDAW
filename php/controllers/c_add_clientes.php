<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-clientes</title>
    <link rel="stylesheet" href="../.././css/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
   
<body>
    <h1 class="text-center">Clientes y sus Datos</h1><BR>

    <?php
    session_start();
    include ".././db/db_conexion.php";
	
	if(!isset($_SESSION['admin'])){ //si no existe sesion admin
		header("Location: ../../");
	}

    require_once(".././models/m_add_clientes.php");

    $conn=conectarBD();
    $clientes=obtenerClientes($conn);//funcion para llenar el array

    require_once(".././views/v_add_clientes.php");

    ?>

    </br>
    <div class="container ">
    <input type="button" value="INICIO" onclick="window.location.href='.././controllers/c_add_inicio.php'" class="btn btn-warning disabled">
    </div>

</body>

<img src="../.././img/banner_web.jpg">

</html>