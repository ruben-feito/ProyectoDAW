<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Finalizar Pedido"){
    echo "Pedido Realizado";
    ?>
	<br>
    <input id="disp" type="button" value="Cerrar Sesion" onclick="window.location.href='./php/cerrar_sesion.php'"/>
    <?php
	
	$conn=conectarBD(); //la conexion dentro para solo abrirla en la pedidos y no a todo aquel que entre en la web

    //buscar el cliente
    $sql="SELECT COUNT(email) as email FROM cliente WHERE email='$email'";
    $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $existe=$row['email'];

    if($existe==0){
        //insertar en tabla cliente un nuevo cliente registrando su TIMESTAMP
        $sql="INSERT INTO cliente (email, telefono, direccion) VALUES ('$email', '$telefono', '$direccion')";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
        mysqli_commit($conn);
    }
	else{
		//actualizar en tabla cliente el cliente añadiendo tlf y direccion y su TIMESTAMP)
        $sql="UPDATE cliente SET telefono=$telefono, direccion=$direccion WHERE email='$email'";
        if(!mysqli_query($conn, $sql)){
            echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
        }
        mysqli_commit($conn);
	}

    desconectarBD($conn);
}
else{
    //llenar array desplegable
    require_once("obtenerPlatos.php");
    $conn=conectarBD();
    $platos=obtenerPlatos($conn);
    desconectarBD($conn);

    ?>
    <form method="POST" action="" target="">
        <input id="disp" type="button" value="Cerrar Sesion" onclick="window.location.href='./php/cerrar_sesion.php'"/>
        <p><span>Cesta del Pedido:</span></p>
        <label for="plato">Platos:</label>
        <select name="plato">
        <?php foreach($platos as $plato) : ?>
            <option> <?php echo $plato ?> </option>
        <?php endforeach; ?>
        </select>
        <div>
            Unidades<input type="text" name="unidades" pattern="^([1-9])|([1-9][0-9]+)$" title="Solo se admiten numeros positivos">
        </div>
        <input id="disp" type="submit" name="form" value="Añadir">
    <form>
    <?php


    //visualizar cesta la primera vez
    $conn=conectarBD();
    require_once("verCesta.php");
    desconectarBD($conn);
    if ($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Añadir") { //comprobacion de boton de submit correcto
        //recogida de datos al pulsar submit
        $conn=conectarBD();

        //cesta
        require_once("cesta.php");

        //visualizar cesta
        require_once("verCesta.php");

        desconectarBD($conn);

    }
}
?>


