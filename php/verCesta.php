<?php

if(!isset($_SESSION['id'])){ //si no existe sesion iniciada
    header("location: ../"); //lanzamos al login
}

if(count($_SESSION['cesta'])==0){
    echo '<p><span>Cesta vacia</span></p>';
}
else{
    $total=0;
    echo "<br><br>";
    echo "<table><tr><th>Plato</th><th>Precio Unidad</th><th>Unidades</th><th></th></tr>";
    foreach ($_SESSION['cesta'] as $id => $unidades){
        echo "<tr>";
        $sql="SELECT nombre FROM plato WHERE id='$id'";
        $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
        $row=mysqli_fetch_assoc($resultado);
        $nombre=$row['nombre'];

        //y precio sumar el total
        $sql="SELECT precio FROM plato WHERE id='$id'";
        $resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
        $row=mysqli_fetch_assoc($resultado);
        $precio=$row['precio'];

        echo "<td>".$nombre."</td><td>".$precio."€</td><td>".$unidades."</td>";

        //boton de quitar producto
        ?>
            <td><form action="./php/quitarPlato.php" method="POST">
            <input type="hidden" name="plato_eliminar" value="<?php echo htmlspecialchars($id) ?>">
            <input id="quitar" type="submit" name="form" value="X"></form></td>
        <?php 

        echo "</tr>";
        $total=$total+($precio*$unidades);
        $_SESSION['total']=$total; //sesion para el total
    }
    echo "</table><br>";
    echo "<p><span>Total: ".$total."€</span></p><br>";
    
    ?>
    <input id="disp" type="button" value="Eliminar Todo" onclick="window.location.href='./php/vaciarCesta.php'"/>
    <p>Forma de pago:</p>
    <input id="disp" type="radio" name="pago" value="Efectivo" checked><label>Efectivo</label>
    <input id="disp" type="radio" name="pago" value="Targeta"><label>Targeta</label>
    <form action="" method="POST"><div><input id="disp" name="form" type="submit" value="Finalizar Pedido"></form>
    <?php
}


?>