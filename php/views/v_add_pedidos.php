<?php

if(count($pedidos)==0){
    echo "<p>NO HAY PEDIDOS</p>"; //<p></p> Para modificar en css
}
else{
    echo "<table>
    <tr><th>Nº Pedido</th><th>Email</th><th>Metodo Pago</th><th>Tarjeta</th><th>Fecha Registro</th></tr>";
    foreach ($pedidos as $pedido) {

        echo "
        <tr><td width='200'>".$pedido['num_pedido']."
        </td><td width='200'>".$pedido['email']."
        </td><td width='200'>".$pedido['metodo_pago']."
        </td><td width='200'>".$pedido['tarjeta']."
        </td><td width='200'>".$pedido['fecha_registro']."
        </td></tr>";
    }
    echo "</table>";
}

?>