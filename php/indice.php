<?php

if(isset($_SESSION['id'])){ //si existe sesion iniciada
    
    require_once("./php/pedido.php");

}
else{
   
    require_once("./php/login.php");
}

?>