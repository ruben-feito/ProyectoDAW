$(document).ready(inicio);

function inicio(){
    $("#tarjetaText").hide();
    $("#efectivo").on("click", function(){
        $("#tarjetaText").hide();
    });
    $("#tarjeta").on("click",function(){
        $("#tarjetaText").show();
    });
}