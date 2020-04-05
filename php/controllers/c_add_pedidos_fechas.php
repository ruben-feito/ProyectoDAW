<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-pedidos-fechas</title>
    <link rel="stylesheet" href="../.././css/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
   
<body>

    <?php
    session_start();
    include ".././db/db_conexion.php";
	
	if(!isset($_SESSION['admin'])){ //si no existe sesion admin
		header("Location: ../../");
	}

    $conn=conectarBD();

    ?>

    <h1 class="text-center">Pedidos entre fechas</h1>
    <B> </B> <BR>

    <form action="" method="post">
    <div class="container ">
        <div class="form-group">
            Fecha desde: <input type="date" name="fechaDesde" class="form-control" id="fecha"></BR>
            Fecha hasta: <input type="date" name="fechaHasta" class="form-control" id="fecha"></BR>
        </div>
    </div>

    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){//despues de submit
        
        require_once(".././models/m_add_pedidos_fechas.php");

        require_once(".././views/v_add_pedidos_fechas.php");
    }

    ?>
    <div class="container ">
    </BR>
        <div class="form-group">
            <input type="submit" value="Ver" class="btn btn-warning disabled" id="submit"></form></BR></BR>
            <input type="button" value="INICIO" onclick="window.location.href='.././controllers/c_add_inicio.php'" class="btn btn-warning disabled"></BR></BR>
        </div>
    </div>
    
</body>

<img src="../.././img/banner_web.jpg">

</html>