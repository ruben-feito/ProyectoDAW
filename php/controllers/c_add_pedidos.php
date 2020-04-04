<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-pedidos</title>
    <link rel="stylesheet" href="../.././js/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
   
<body>
    <h1 class="text-center">Pedidos y sus Datos</h1><BR>

    <?php
    session_start();
    include ".././db/db_conexion.php";

    require_once(".././models/m_add_pedidos.php");

    $conn=conectarBD();
    $pedidos=obtenerPedidos($conn);//funcion en /m_add_pedidos.php llena pedidos

    require_once(".././views/v_add_pedidos.php");

    ?>

    </br>
    <div class="container ">
    <input type="button" value="INICIO" onclick="window.location.href='.././controllers/c_add_inicio.php'" class="btn btn-warning disabled"></BR></BR>
    </div>
    
</body>

<img src="../.././img/banner_web.jpg">

</html>