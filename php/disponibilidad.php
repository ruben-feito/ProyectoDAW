<?php

if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['form']=='Disponibilidad') { //comprobacion de boton de submit correcto
    //extraccion de reserva
    $comensales=$_REQUEST["comensales"];

    $fecha=strtotime($_REQUEST["fecha"]);
    $fecha=date("Y-m-d", $fecha);

    $fecha_actual=date("Y-m-d"); //fecha automatica, la actual

    $hora_actual=date("H:i:s"); //fecha automatica, la actual
    
    $hora=strtotime($_REQUEST["hora"]);
    $hora=date("H:i:s", $hora);

    //si se puede hacer la reserva
   
   
    if($fecha>=$fecha_actual && $fecha!="1970-01-01" && disponibilidad($comensales, $fecha, $hora)){ //solo comprobar fecha
        $disponibilidad=true;
        if($fecha==$fecha_actual && $hora<$hora_actual){ //a misma fecha comprobar hora
            $disponibilidad=false;
        }

    }
    if($disponibilidad==false){
        ?>
            <br>
            <p>No es posible formalizar la reserva, para buscar otro dia pulse atras.</p>
            <input id="disp" type="button" name="atras" value="Atras" onclick="history.back()"> 
        <?php
    }
}
else{
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

//funcion que comprueba que los comensales seleccionados puedan reservar, el maximo es 20 por hora
//parametro la conexion, los comensales, fecha y hora de la reserva
//delvuelve si hay disponibilidad
function disponibilidad($comensales, $fecha, $hora){ //se podran hacer 20 comensales por hora
    $disponibilidad=false;

    $conn=conectarBD(); //la conexion dentro para solo abrirla en la reservas y no a todo aquel que entre en la web

    //sacar la suma de comensales
    $sql="SELECT SUM(comensales) as total_comensales FROM reserva WHERE fecha='$fecha' AND hora='$hora'";
    $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $total_comensales=$row['total_comensales'];

    if($total_comensales+$comensales<=20){
        $disponibilidad=true;
    }

    desconectarBD($conn);

    return $disponibilidad;
}

?>