var i = 0;
var images = [];	// Array de Imagens
var time = 4000;	// Tempo para mudar em Milésimos

// Lista de imagens
images[0] = "img/BG.jpg";
images[1] = "img/hero.jpg";

// Muda imagem
function changeImg(){
    document.slide.src = images[i]; //vai buscar as imagens do array

    // Check If Index Is Under Max
    if(i < images.length - 1){
        // Adiciona 1 para var i
        i++;
    } else {
        // Reseta i para 0
        i = 0;
    }

    // Corre a função a cada 6 segundos.
    setTimeout("changeImg()", time);
}

// Corre a função quando a página abre
window.onload=changeImg;