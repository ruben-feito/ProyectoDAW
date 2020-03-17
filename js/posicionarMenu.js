posicionarMenu();
             
$(window).scroll(function() {    
    posicionarMenu();
});
    
function posicionarMenu() {
    var altura_del_header = $('header').outerHeight(true);
    var altura_del_menu = $('.menu').outerHeight(true);
    
    if ($(window).scrollTop() >= altura_del_header){
        $('.menu').addClass('fixed');
        $('section').css('margin-top', (altura_del_menu) + 'px');
    } else {
        $('.menu').removeClass('fixed');
        $('section').css('margin-top', '0');
    }
}   