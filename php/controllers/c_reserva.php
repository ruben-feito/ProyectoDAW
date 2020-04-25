<?php

include "./php/models/m_funcion_reserva.php";
require_once ("./php/models/m_funcion_enviarCorreo.php");

if($disponibilidad){ //si el formulario previo fue correcto
?>
    <form method="POST" action="" target="">
        <p><i><?php echo $comensales ?> Comensales, Dia: <?php echo $fecha ?>, Hora: <?php echo $hora ?></php></i></p>
        <p>Email:</p>
        <input type="email" name="email" pattern="^([a-zA-Z0-9_\\.\\-]+)@([a-zA-Z0-9_\\.\\-]+)\.([a-zA-Z\\.]{2,6})$" title="Debe ser un correo valido" required></input></br>
        <p>Telefono:</p>
        <input type="tel" name="telefono" pattern="^[6789][0-9]{8}$" title="Debe empezar por 6, 7, 8 o 9 y ser de 9 digitos"></input></br>
        <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
        <input type="hidden" name="hora" value="<?php echo $hora ?>">
        <input type="hidden" name="comensales" value="<?php echo $comensales ?>">
        </br><p>Si tiene algun pedido sin finalizar se perderá su información.</p>
		</br><p>Se le enviará un correo electronico a modo de confirmación.</p>
        <input id="disp" type="submit" name="form" value="Reservar"> 
        <input id="disp" type="button" name="atras" value="Atras" onclick="history.back()"> 
    <form>
<?php
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=="Reservar") { //comprobacion de boton de submit correcto
    
    //llamada a modelo
    require_once("./php/models/m_reserva.php");

}
else{
    
}

?>