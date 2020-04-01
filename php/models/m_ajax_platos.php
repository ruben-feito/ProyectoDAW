<?php 

require ".././db/db_conexion.php";

$conn=conectarBD();
$tipo=$_POST['tipo'];

$sql="SELECT nombre FROM plato WHERE tipo='$tipo'";
$resultado=mysqli_query($conn,$sql);

$cadena="<label>Platos:</label> 
			<select name='plato'>";

while ($row=mysqli_fetch_assoc($resultado)) {
    $cadena=$cadena.'<option>'.$row['nombre'].'</option>';
}

echo $cadena."</select>";
	
desconectarBD($conn);

?>