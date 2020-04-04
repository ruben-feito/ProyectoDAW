<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-login</title>
    <link rel="stylesheet" href="../.././js/bootstrap.min.css">
    <link rel="stylesheet" href="../.././css/stylesheet-admin.css">
</head>
    
<body>
    <h1 class="text-center">Acceso Administrador</h1>

    <?php
    session_start();
    include ".././db/db_conexion.php";

    echo '<form action="" method="post">';

    ?>
    <div class="container ">
        <div class="form-group">
        Usuario <input type="text" name="usuario" placeholder="admin" class="form-control">
        </div></BR>
        <div class="form-group">
        Clave <input type="password" name="clave" placeholder="admin" class="form-control">
        </div></BR>
        <input type="submit" name="submit" value="Login" class="btn btn-warning disabled">	
        </BR>
    </div>
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST") { 

        require_once(".././models/m_add_login.php");
        
        //$valido esta en m_add_login.php comprueba que sea un usuario valido
        if($valido){
            $_SESSION['admin']=$nombre;
            header("location: .././controllers/c_add_inicio.php");
        }
        else{
            header("location: .././controllers/c_add_login.php");
        }
        
    }
    ?>

    <img src="../.././img/banner_web.jpg">

</body>

</html>