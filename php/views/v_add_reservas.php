<?php

if(count($reservas)==0){
    echo "<p>NO HAY RESERVAS</p>"; //<p></p> Para modificar en css
}
else{
    echo "<table>
    <tr><th>Reserva</th><th>Email</th><th>Fecha</th><th>Hora</th><th>Comensales</th><th>Fecha Registro</th></tr>";
    foreach ($reservas as $reserva) {

        echo "
        <tr><td width='200'>".$reserva['num_reserva']."
        </td><td width='200'>".$reserva['email']."
        </td><td width='200'>".$reserva['fecha']."
        </td><td width='200'>".$reserva['hora']."
        </td><td width='200'>".$reserva['comensales']."
        </td><td width='200'>".$reserva['fecha_registro']."
        </td></tr>";
    }
    echo "</table>";
}

?>