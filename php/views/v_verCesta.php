<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../../"); //lanzamos al login
}

if(count($_SESSION['cesta'])==0){
    echo '<p><span>Cesta vacia</span></p>';
}
else{
    $total=0;
    echo "<br><br>";
	echo '<form action="" method="POST"></form>'; //este form esta aqui puesto porque sino lo poniamos no se borra el primer registro, realmente no es correcto hacer esto, pero no encontrabaa el error. Si quieres porbarlo comenta esta linea y añade unos pedidos, veras que se borran todos menos el primero
    echo "<table><tr><th>Plato</th><th>Precio Unidad</th><th>Unidades</th><th>Borrar</th></tr>";	
				
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
            <td>
                <form action="./php/models/m_quitarPlato.php" method="POST"> 
                <input type="hidden" name="plato_eliminar" value="<?php echo htmlspecialchars($id) ?>">
				
                <input id="quitar" type="submit" name="form" value="X">
                 </form> 
            </td>
        <?php 
        echo "</tr>";
        $total=$total+($precio*$unidades);
        $_SESSION['total']=$total; //sesion para el total
    }
    echo "</table><br>";
    echo "<p><span>Total: ".$total."€</span></p><br>";
    
    ?>
    <input id="disp" class="pedidos" type="button" value="Eliminar Todo" onclick="window.location.href='./php/models/m_vaciarCesta.php'"/>
    <form action="" method="POST">
        <div id="pago">
            <p>Forma de pago:</p>
            <input type="radio" name="pago" id="efectivo" value="efectivo" checked><label>- Efectivo</label><br>
            <input type="radio" name="pago" id="tarjeta" value="tarjeta"><label>- Tarjeta</label>
        </div>
        <input id="disp" id="pago" name="form" type="submit" value="Finalizar Pedido">
    </form> 
    <?php
}

?>