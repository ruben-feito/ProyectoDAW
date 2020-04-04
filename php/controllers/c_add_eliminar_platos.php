<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-eliminar</title>
    <link rel="stylesheet" href="../.././js/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
   
<body>
    <h1 class="text-center">Eliminar Plato</h1><BR>

    <?php

    session_start();
    include ".././db/db_conexion.php";

    require_once(".././models/m_add_obtenerPlatos.php");

    $conn=conectarBD();
    $platos=obtenerPlatos($conn);

    ?>

    <form action="" method="post">
    <div class="container ">
        <div>
        Platos:
        <select name="optionPlato" class="form-control" id="desplegable"><!--Desplegable con los platos-->
                <?php foreach($platos as $plato) : ?>
                            <option> <?php echo $plato ?> </option>
                        <?php endforeach; ?></select><br>
                </select>
        </div></br>
        <input type="submit" value="Eliminar" class="btn btn-warning disabled" id="submit"></form>
        </BR>
    </div>
    
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){//despues de submit

        $nombrePlato=$_REQUEST['optionPlato'];
        
        require_once(".././models/m_add_elminar_platos.php");

        header("Refresh:0");

    }

    ?>

    <div class="container ">
    <input type="button" value="INICIO" onclick="window.location.href='.././controllers/c_add_inicio.php'" class="btn btn-warning disabled"></BR></BR>
    </div>

</body>

<img src="../.././img/banner_web.jpg">

</html>