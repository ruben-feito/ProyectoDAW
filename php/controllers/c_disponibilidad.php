<?php

include "./php/models/m_funcion_disponibilidad.php";

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=='Disponibilidad') { //comprobacion de boton de submit correcto

    //llamada a modelo
    require_once("./php/models/m_disponibilidad.php");

    if($disponibilidad==false){
        //llamada a vista negativa
        require_once("./php/views/v_disponibilidad_negativa.php");
    }
}
else { 
    ?>
    <form id="disponiblidad" method="POST" action="" target="">
        <p>Seleccione el número de comensales</p>
        <p>Comensales</p>
        <select name="comensales"> 
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
        </select></br>
        <p>Para reservas con un número superior de comensales, llame al restaurante.</p>
        </br>
        <p>Dia:</p>
        <input type="date" name="fecha"></input></br>
        <p>Hora:</p>
        <select name="hora"> 
            <option>13:30</option>
            <option>14:00</option>
            <option>14:30</option>
            <option>15:00</option>
            <option>15:30</option>
            <option>16:00</option>
            <option>16:30</option>
            <option>19:30</option>
            <option>20:00</option>
            <option>20:30</option>
            <option>21:00</option>
            <option>21:30</option>
            <option>22:00</option>
            <option>22:30</option>
            <option>23:00</option>
            <option>23:30</option>
        </select></br>
        </br>
        <input id="disp" class="reservas" type="submit" name="form" value="Disponibilidad"> 
    </form>
    <?php
}

?>