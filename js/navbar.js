//quando se da scroll para baixo adiciona a class "black"
$(window).on("scroll", function() {
    if($(window).scrollTop()) {
        $('nav').addClass('black');
    }
// se nao, remove a class black
    else {
        $('nav').removeClass('black');
    }
})