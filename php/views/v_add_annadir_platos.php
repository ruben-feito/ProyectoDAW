<?php

if($existe==1){
    echo "<p id='error'>El plato "."$nombre"." ya existe</p>";
}
else if($nombre=="" || $precio==""){
    echo "<p id='error'>Nombre y Precio no pueden estar vacíos</p>";
}
else{
    echo "<p>"."$nombre"." añadido correctamente</p>"; //<p></p> Para modificar en css
}

?>