$(document).ready(inicio);

function inicio(){
    $("#tarjetaText").hide();
    $("#efectivo").on("click", function(){
        $("#tarjetaText").hide(); //ocultar
		$("#tarjetaText").attr("required",false); //quitar required
    });
    $("#tarjeta").on("click",function(){
        $("#tarjetaText").show(); //mostrar
		$("#tarjetaText").attr("required",true); //poner required
    });
}