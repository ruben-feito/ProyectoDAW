$(document).ready(inicio);

function inicio(){
    $(".pedidos").on("click", pedidos);
    $(".reservas").on("click", reservas);
}

function pedidos(){
    var url=$(location).attr("href");
    console.log(url);
    if(url.indexOf("/#pedidos")==-1){
        window.location.replace("/#pedidos"); //añadir #pedidos a la url si no lo tiene
    }
}

function reservas(){
    var url=$(location).attr("href");
    console.log(url);
    if(url.indexOf("/#reservas")==-1){
        window.location.replace("/#reservas"); //añadir #reservas a la url si no lo tiene
    }
}

