<?php
/* Conexión BD */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'restaurante');

//funcion para crear la conexion a una base de datos
//parametros: 	$servername -> nombre del host
//				$username -> nombre usuario
//				$password -> password
//				$dbname -> nombre de la base de datos
//devuelve la conexion creada o el error de conexion
function conectarBD(){
    $conn=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$conn) {
        trigger_error("Conexion Fallida: ".mysqli_connect_error()."<br>");
    }
    /*echo "Conexion Realizada a $dbname<br>";*/
    return $conn;
}

//funcion para hacer la desconexion de una base de datos
//parametros: 	$conn -> la conexion de BD
//no devuelve nada
function desconectarBD($conn){
    /*echo "Desconexion realizada";*/
    mysqli_close($conn);
}
?>