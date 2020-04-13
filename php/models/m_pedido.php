<?php

if(!isset($_SESSION['email'])){ //si no existe sesion iniciada
    header("location: ../../"); //lanzamos al login
}

$email=$_SESSION['email'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$metodo_pago=$_REQUEST['pago']; 
$total=$_SESSION['total'];

if($metodo_pago=="efectivo"){
    introducirPago($email, $telefono, $direccion, $metodo_pago, $total);
}
else if($metodo_pago=="tarjeta"){
    include "api/apiRedsys.php";  
    $miObj = new RedsysAPI;

    //$url_tpv = 'https://sis.redsys.es/sis/realizarPago';
    $url= $_SERVER['HTTP_REFERER'];
    $url_tpv = 'https://sis-t.redsys.es:25443/sis/realizarPago';
    $version = "HMAC_SHA256_V1"; 
    $clave = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //poner la clave SHA-256
    $name = 'EL RINCON DEL SIN'; 
    $code = '999008881'; 
    $terminal = '1';
    $order = date('ymdHis');
    $amount = $total * 100;
    $currency = '978';
    $consumerlng = '001';
    $transactionType = '0';
    $urlMerchant = $url; 
    $urlweb_ok = $url.'php/controllers/c_exito.php'; 
    $urlweb_ko = $url; 

    $miObj->setParameter("DS_MERCHANT_AMOUNT", $amount);
    $miObj->setParameter("DS_MERCHANT_CURRENCY", $currency);
    $miObj->setParameter("DS_MERCHANT_ORDER", $order);
    $miObj->setParameter("DS_MERCHANT_MERCHANTCODE", $code);
    $miObj->setParameter("DS_MERCHANT_TERMINAL", $terminal);
    $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE", $transactionType);
    $miObj->setParameter("DS_MERCHANT_MERCHANTURL", $urlMerchant);
    $miObj->setParameter("DS_MERCHANT_URLOK", $urlweb_ok);      
    $miObj->setParameter("DS_MERCHANT_URLKO", $urlweb_ko);
    $miObj->setParameter("DS_MERCHANT_MERCHANTNAME", $name); 
    $miObj->setParameter("DS_MERCHANT_CONSUMERLANGUAGE", $consumerlng);    

    $params = $miObj->createMerchantParameters();
    $signature = $miObj->createMerchantSignature($clave);
    ?>
    <form id="realizarPago" action="<?php echo $url_tpv; ?>" method="post">
        <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
        <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
        <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'> 
    </form>
    <p>Un momento por favor...</p>
    <script>
    $(document).ready(function () {
        $("#realizarPago").submit();
    });
    </script>
    <?php
    introducirPago($email, $telefono, $direccion, $metodo_pago, $total);
}

//envio de correo
$mensaje="Pedido para $direccion está confirmado";
correo($email, $mensaje);

?>