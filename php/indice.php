<?php

if(isset($_SESSION['email'])){ //si existe sesion iniciada
    
    require_once("./php/pedido.php");

}
else{
   
    require_once("./php/login.php");
}

?>