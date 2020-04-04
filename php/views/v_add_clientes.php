<?php

if(count($clientes)==0){
    echo "<p>NO HAY CLIENTES</p>"; //<p></p> Para modificar en css
}
else{
    echo "<table>
    <tr><th>Email</th><th>Telefono</th><th>Direccion</th><th>Ultimo Registro</th></tr>";
    foreach ($clientes as $cliente) {

        echo "
        <tr><td width='250'>".$cliente['email']."
        </td><td width='200'>".$cliente['telefono']."
        </td><td width='250'>".$cliente['direccion']."
        </td><td width='200'>".$cliente['ultimo_registro']."
        </td></tr>";
    }
    echo "</table>";
}

?>