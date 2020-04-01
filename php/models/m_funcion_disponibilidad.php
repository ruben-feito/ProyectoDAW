<?php

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