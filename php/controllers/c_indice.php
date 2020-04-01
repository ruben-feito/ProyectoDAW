<?php

if(isset($_SESSION['email'])){ //si existe sesion iniciada
    
    require_once("./php/controllers/c_pedido.php");

}
else{
   
    require_once("./php/controllers/c_login.php");
    
}

?>