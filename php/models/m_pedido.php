<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../../"); //lanzamos al login
}

$email=$_SESSION['email'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$metodo_pago=$_REQUEST['pago']; //el metodo de pago

$conn=conectarBD(); //la conexion dentro para solo abrirla en la pedidos y no a todo aquel que entre en la web

//buscar el cliente
$sql="SELECT COUNT(email) as email FROM cliente WHERE email='$email'";
$resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
$row=mysqli_fetch_assoc($resultado);
$existe=$row['email']; //si no existe hay que crearlo y si existe actualizar datos

if($existe==0){
    //insertar en tabla cliente un nuevo cliente registrando su TIMESTAMP
    $sql="INSERT INTO cliente (email, telefono, direccion) VALUES ('$email', '$telefono', '$direccion')";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
    mysqli_commit($conn);
}
else{
    //actualizar en tabla cliente el cliente añadiendo tlf y direccion y su TIMESTAMP
    $sql="UPDATE cliente SET telefono=$telefono, direccion='$direccion' WHERE email='$email'";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
    mysqli_commit($conn);
}

//sacar el numero maximo de pedido
$sql="SELECT MAX(num_pedido) as maximo FROM pedido";
$resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
$row=mysqli_fetch_assoc($resultado);
$maximo=$row['maximo']; //si no existe hay que crearlo y si existe actualizar datos

if($maximo==null){ //bd vacia
    $maximo=1;
}
else{
    $maximo++; // si no sumarle 1
}

if($metodo_pago=="efectivo"){
    //insertar pedido registrando su TIMESTAMP
    $sql="INSERT INTO pedido (num_pedido, email, metodo_pago) VALUES ('$maximo', '$email', '$metodo_pago')";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
}
else if($metodo_pago=="tarjeta"){
    $tarjeta=$_REQUEST['tarjeta']; //tarjeta
    //insertar pedido registrando su TIMESTAMP
    $sql="INSERT INTO pedido (num_pedido, email, metodo_pago, tarjeta) VALUES ('$maximo', '$email', '$metodo_pago', '$tarjeta')";
    if(!mysqli_query($conn, $sql)){
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    }
}
mysqli_commit($conn);


//insertar desglose_pedido
foreach ($_SESSION['cesta'] as $id => $unidades) {
    $sql = "INSERT INTO desglose_pedido (num_pedido, id_plato, unidades) VALUES ('$maximo', '$id', '$unidades')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
    } 
}
mysqli_commit($conn);

desconectarBD($conn);
/*
//NO FUNCIONA, CLOUDING.IO TIENE CAPADO SMTP
//envio de correo
$mensaje="Pedido para $direccion está confirmado";
correo($email, $mensaje);
*/
?>