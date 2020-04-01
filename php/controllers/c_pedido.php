<?php

if(!isset($_SESSION['email'])){
    header("location: ../../"); 
}

if($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Finalizar Pedido"){

    //llamada a modelo
    require_once("./php/models/m_pedido.php");

    //llamada a vista
    require_once("./php/views/v_pedido.php");

}
else{
    //llenar array desplegable
    require_once("./php/models/m_obtenerPlatos.php");
    $conn=conectarBD();
    $platos=obtenerPlatos($conn);
    desconectarBD($conn);

    ?>
    <form method="POST" action="" target="">
        <input id="disp" type="button" value="Cerrar Sesion" onclick="window.location.href='./php/models/m_cerrar_sesion.php'"/>
        <p><span>Cesta del Pedido:</span></p>
        <label for="plato">Platos:</label>
        <select name="plato">
        <?php foreach($platos as $plato) : ?>
            <option> <?php echo $plato ?> </option>
        <?php endforeach; ?>
        </select>
        <div>
            Unidades<input type="text" name="unidades" pattern="^([1-9])|([1-9][0-9]+)$" title="Solo se admiten numeros positivos" required>
        </div>
        <input id="disp" class="pedidos" type="submit" name="form" value="Añadir">
    <form>
    <?php


    //visualizar cesta la primera vez
    $conn=conectarBD();
    require_once("./php/views/v_verCesta.php");
    desconectarBD($conn);

    if ($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Añadir") { //comprobacion de boton de submit correcto
        //recogida de datos al pulsar submit
        $conn=conectarBD();

        //cesta
        require_once("./php/models/m_cesta.php");

        //visualizar cesta
        require_once("./php/views/v_verCesta.php");

        desconectarBD($conn);

    }
}

?>