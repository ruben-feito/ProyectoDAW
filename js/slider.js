$(document).ready(function($){
    setInterval(function(){
        moverDerecha();
    }, 3000);
 
	var slide_contador=$("#slider ul li").length;
	var slide_ancho=$("#slider ul li").width();
	var slide_alto = $("#slider ul li").height();
	var slide_ul_alto = slide_contador * slide_ancho;
	
	$("#slider").css({ width: slide_ancho, height: slide_alto });
	
	$("#slider ul").css({ width: slide_ul_alto, marginLeft: - slide_ancho });
	
    $("#slider ul li:last-child").prependTo("#slider ul");

    function moverIzquierda() {
        $("#slider ul").animate({
            left: + slide_ancho
        }, 200, function () {
            $("#slider ul li:last-child").prependTo("#slider ul");
            $("#slider ul").css("left", "");
        });
    };

    function moverDerecha() {
        $("#slider ul").animate({
            left: - slide_ancho
        }, 200, function () {
            $("#slider ul li:first-child").appendTo("#slider ul");
            $("#slider ul").css("left", "");
        });
    };

    $("a.control_prev").click(function () {
        moverIzquierda();
    });

    $("a.control_next").click(function () {
        moverDerecha();
    });

});  