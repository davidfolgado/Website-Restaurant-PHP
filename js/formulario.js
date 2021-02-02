function send() {

        var Valor_Campo = meuform.email.value;
        var Valor_Campo = meuform.requerir.value;
        if (Valor_Campo == "") {
            alert("Preencha os campos")
        }
    else {
        var link = 'mailto:davidfolgado25@gmail.com?subject=Message from '
            + document.getElementById('email').value
            + document.getElementById('requerir').value
            + '&body=' + document.getElementById('email').value;
        window.location.href = link;
        alert("Mensagem enviada");
        return true;
    }
}

