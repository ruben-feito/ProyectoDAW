<?php

//function para atacar la BD ingresando la reserva
//parametros los pedidos por formularios: comensales, fecha, hora y email
//no devuelve nada
function reservar($comensales, $fecha, $hora, $email, $telefono){

    $conn=conectarBD(); //la conexion dentro para solo abrirla en la reservas y no a todo aquel que entre en la web

    //buscar el cliente
    $sql="SELECT COUNT(email) as email FROM cliente WHERE email='$email'";
    $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $existe=$row['email'];

    if($existe==0){
        //insertar en tabla cliente un nuevo cliente registrando su primera ultimo pedido (ultimo_registro con TIMESTAMP)
        $sql = "INSERT INTO cliente (email, telefono) VALUES ('$email', '$telefono')";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
        mysqli_commit($conn);
    }
    else{
        //si ya existe se actualiza el telefono y su ultimo pedido (ultimo_registro con TIMESTAMP)
        $sql="UPDATE cliente SET telefono=$telefono WHERE email='$email'";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
        mysqli_commit($conn);
    }
    
    //insertar en tabla reservas la nueva reserva
    $sql = "INSERT INTO reserva (num_reserva, email, fecha, hora, comensales) VALUES (null, '$email', '$fecha', '$hora', '$comensales')";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
    
    desconectarBD($conn);
}
?>