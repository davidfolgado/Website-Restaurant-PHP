$(document).ready(function() {
    $("img").click(function(){ //quando clica na imagem
        $src = $(this).attr("src"); //obtem o valor do atributo src
        if (!$("#galeria").length > 0) {
            $("body").append("<div id='galeria'><span class='material-icons'>close</span><img src=''></div>"); //o metodo append criao conteudo para fechar a imagem, o X no canto
            $("#galeria img").attr("src", $src);//mostra lightbox
        } else {
            $("#galeria").show(); //faz com que se possa visualizar a imagem mais que uma vez
            $("#galeria img").attr("src", $src); //faz com que cada imagem so se possa ver essa mesma imagem
        }
    });
    $("body").on("click", "#galeria span", function() { //função de fechar
        $("#galeria").hide(); //esconde a imagem
    });
});
