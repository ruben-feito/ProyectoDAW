<?php

if($disponibilidad){ //si el formulario previo fue correcto

?>

    <form method="POST" action="" target="reservas">
        <p><i><?php echo $comensales ?> Comensales, Dia: <?php echo $fecha ?>, Hora: <?php echo $hora ?></php></i></p>
        <p>Email:</p>
        <input type="email" name="email"></input></br>
        <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
        <input type="hidden" name="hora" value="<?php echo $hora ?>">
        <input type="hidden" name="comensales" value="<?php echo $comensales ?>">
        <input id="disp" type="submit" name="form" value="Reservar"> 
        <input id="disp" type="button" name="atras" value="Atras" onclick="history.back()"> 
    <form>

<?php

}

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=='Reservar') { //comprobacion de boton de submit correcto

    $fecha=$_REQUEST["fecha"]; //en un campo hidden para poder pasarlo entre formularios

    $hora=$_REQUEST["hora"]; //en un campo hidden para poder pasarlo entre formularios

    $comensales=$_REQUEST["comensales"]; //en un campo hidden para poder pasarlo entre formularios

    $email=$_REQUEST["email"]; //el del formulario

    reservar($comensales, $fecha, $hora, $email);
    
?>
    <p>Reserva Realizada sobre el email: <?php echo $email ?></p>
    <input id="disp" type="button" name="atras" value="Atras" onclick="history.go(-2)"> 
<?php
}

//function para atacar la BD ingresando la reserva
//parametros los pedidos por formularios: comensales, fecha, hora y email
//no devuelve nada
function reservar($comensales, $fecha, $hora, $email){

    $conn=conectarBD(); //la conexion dentro para solo abrirla en la reservas y no a todo aquel que entre en la web

    //buscar el cliente
    $sql="SELECT COUNT(email) as email FROM cliente WHERE email='$email'";
    $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $existe=$row['email'];

    if($existe==0){
        //insertar en tabla cliente un nuevo cliente registrando su primera reserva (con TIMESTAMP)
        $sql = "INSERT INTO cliente (email) VALUES ('$email')";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
    }
    
    //insertar en tabla reservas la nueva reserva
    $sql = "INSERT INTO reserva (num_reserva, email, fecha, hora, comensales) VALUES (null, '$email', '$fecha', '$hora', '$comensales')";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
    

    desconectarBD($conn);
}
?>