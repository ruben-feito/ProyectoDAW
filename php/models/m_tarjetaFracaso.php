<?php

if($_SERVER["REQUEST_METHOD"]=="POST" && $_REQUEST['form']=="Volver"){
    header('Location: '.$_SERVER['HTTP_REFERER'].'#pedidos');
}

?>