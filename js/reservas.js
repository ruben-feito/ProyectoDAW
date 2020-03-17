$(document).ready(inicio);

function inicio(){
    $("#disp").on("click", url);
}
function url(){
    var url=$(location).attr("href");
    console.log(url);
    if(url.indexOf("/#reservas")==-1){
        window.location.replace("/#reservas"); //añadir #reservas a la url si no lo tiene
    }
}