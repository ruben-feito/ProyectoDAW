<?php

require_once ("./php/models/m_funcion_introducirPago.php");
require_once ("./php/models/m_funcion_enviarCorreo.php");

if(!isset($_SESSION['email'])){
    header("location: ../../"); 
}

if(isset($_SESSION) && $_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Finalizar Pedido"){

    //llamada a modelo
    require_once("./php/models/m_pedido.php"); //tiene incluido tanto efectivo como tarjeta

    if($metodo_pago=="efectivo"){
        //llamada a vista
       require_once("./php/views/v_pedido.php");
   }

}
else{
    ?>
    <form method="POST" action="" target="">
        <input id="disp" type="button" value="Cerrar Sesion" onclick="window.location.href='./php/models/m_cerrar_sesion.php'"/>
        <p><span>Cesta del Pedido:</span></p>
        <label>Tipo:</label>
        <select id="lista_tipos" name="lista_tipos">
            <option value="Entrantes" selected>Entrantes</option>
            <option value="Pastas">Pastas</option>
            <option value="Carnes">Carnes</option>
            <option value="Postre">Postre</option>
            <option value="Infantil">Infantil</option>
        </select>
        <br>
        <div id="lista_platos"></div>
        <label>Unidades:</label>
        <input type="number" name="unidades" min="1" max="30" required>
        <!--<input type="text" name="unidades" pattern="^([1-9])|([1-9][0-9]+)$" title="Solo se admiten numeros positivos" required>-->
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