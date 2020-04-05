<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-annadir</title>
    <link rel="stylesheet" href="../.././css/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
   
<body>
    <h1 class="text-center">Añadir Plato</h1><BR>

    <?php
    session_start();
    include ".././db/db_conexion.php";
	
	if(!isset($_SESSION['admin'])){ //si no existe sesion admin
		header("Location: ../../");
	}

    $conn=conectarBD();

    ?>

    <form action="" method="post">
    <div class="container ">
        <div class="form-group">
        Nombre <input type="text" name="nombre" pattern="^[a-zA-Z ]+$" title="Letras y espacios" class="form-control">
        </div></BR>
        <div class="form-group">
        Precio <input type="text" name="precio" pattern="^[0-9]+([\\.][0-9]{1,2})?$" title="Numeros enteros ejemplo 5 o con dos decimales y punto ejemplo 9.99" class="form-control">
        </div></BR>
        <div class="form-group">
        Tipo:
        <select name="tipo" class="form-control" id="desplegable">
            <option>Entrantes</option>
            <option>Pastas</option>
            <option>Carnes</option>
            <option>Postre</option>
            <option>Infantil</option>
        </select>
        </div></br>

        <input type="submit" value="Añadir" class="btn btn-warning disabled" id="submit"></form></BR></BR>
        <input type="button" value="INICIO" onclick="window.location.href='.././controllers/c_add_inicio.php'" class="btn btn-warning disabled"></BR></BR>
       
    </div>
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){//una vez se pulse el submit
        
        require_once(".././models/m_add_annadir_platos.php");

        require_once(".././views/v_add_annadir_platos.php");
    }

    ?>

    </br>

</body>

<img src="../.././img/banner_web.jpg">

</html>