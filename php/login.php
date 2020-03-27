<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=="Iniciar Sesion" && $_REQUEST["email"]!="" && $_REQUEST["telefono"]!="" && $_REQUEST["direccion"]!="") { //comprobacion de boton de submit correcto

    //extraccion de login
    $email=$_REQUEST["email"];

    $telefono=$_REQUEST["telefono"];

    $direccion=$_REQUEST["direccion"];

    $conn=conectarBD(); //la conexion dentro para solo abrirla en la reservas y no a todo aquel que entre en la web

    //buscar el cliente
    $sql="SELECT COUNT(email) as email FROM cliente WHERE email='$email'";
    $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $existe=$row['email'];

    /*if($existe==0){
        //insertar en tabla cliente un nuevo cliente registrando su primera ultima reserva (ultimo_registro con TIMESTAMP)
        $sql = "INSERT INTO cliente (email, telefono, direccion) VALUES ('$email', '$telefono', '$direccion')";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
        mysqli_commit($conn);
    }*/

    desconectarBD($conn);

    //if($existe) { //si se encontro el cliente
        $id=$email;
        $_SESSION['id']=$id; //guardamos la sesion con el id
        $_SESSION['cesta']=array(); //guardamos los productos
    
        //buscar sesion con el nombre del id
        if(isset($_COOKIE[$_SESSION['id']])){ 
            //deserializar para sacar la informacion
            $_SESSION['cesta']=unserialize($_COOKIE[$_SESSION['id']]); //pasar datos de coockie a cesta
        }
        else{ //si no existe se crea
            $cookie_name=$id;
            $cookie_value=$_SESSION['cesta']; 
            //serializar para meter la informacion
            setcookie($cookie_name, serialize($cookie_value), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
        }
    
        header("Refresh:0"); //refrescar
    //}
    
}
else{ //muestra el formulario sin pulsar submit
    ?>
    <form method="POST" action="" target="">
        <p>Email:</p>
        <input type="email" name="email" pattern="^([a-zA-Z0-9_\\.\\-]+)@([a-zA-Z0-9_\\.\\-]+)\.([a-zA-Z\\.]{2,6})$" title="Debe ser un correo valido"></input></br>
        <p>Tel&eacute;fono:</p>
        <input type="tel" name="telefono" pattern="^[6789][0-9]{8}$" title="Debe empezar por 6, 7, 8 o 9 y ser de 9 digitos"></input></br>
        <p>Direcci&oacute;n:</p>
        <input type="text" name="direccion" pattern="^[a-zA-Z\\d ]{3,}$" title="El formato debe ser válido"></input></br>
        <input id="disp" class="pedidos" type="submit" name="form" value="Iniciar Sesion"> 
    <form>
    <?php
}