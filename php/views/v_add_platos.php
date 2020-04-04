<?php

if(count($platos)==0){
    echo "<p>NO HAY PLATOS</p>"; //<p></p> Para modificar en css
}
else{
    echo "<table>
    <tr><th>Id</th><th>Nombre</th><th>Precio</th><th>Tipo</th></tr>";
    foreach ($platos as $plato) {

        echo "
        <tr><td width='50'>".$plato['id']."
        </td><td width='300'>".$plato['nombre']."
        </td><td width='100'>".$plato['precio']."
        </td><td width='200'>".$plato['tipo']."
        </td></tr>";
    }
    echo "</table>";
}

?>