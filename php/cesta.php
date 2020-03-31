<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../"); //lanzamos al login
}

$plato=$_REQUEST["plato"]; //el del selector

$unidades=$_REQUEST["unidades"];

//si las unidades son distintas de 0
if ($unidades!=0) { //este if es "redundante" con el input de unidades de pedido.php, si el required de da problemas tendriamos que borrarlo y este if haria lo mismo que el
	
	//buscar id producto y cantidad
	$sql="SELECT id FROM plato WHERE nombre='$plato'";
	$resultado=mysqli_query($conn, $sql); //el $resultado no es valido y hay que tratarlo
	$row=mysqli_fetch_assoc($resultado);
	$id=$row['id'];

	//guardarlo en el array asotiativo
	$_SESSION['cesta'][$id]=(int)$unidades;
	setcookie($_SESSION['email'], serialize($_SESSION['cesta']), time() + (86400 * 30), "/"); // 86400 segundos = 1 día

	if(!empty($_SESSION['cesta'][$id]) && $_SESSION['cesta'][$id]<=0){ 
		//si las unidades son <=0 borrarlo de la cesta
		unset($_SESSION['cesta'][$id]);
		setcookie($_SESSION['email'], serialize($_SESSION['cesta']), time() + (86400 * 30), "/"); // 86400 segundos = 1 día
	}
}

header("Refresh:0"); //refrescar los cambios

?>