var objPeople = [
    {
        username: "david",
        password:"folgado",
    },
    {
        username: "tiago",
        password:"manteigas",
    },
    {
        username: "estcb",
        password:"castelobranco",
    }
]
function login(){
            //recuperar dados do formulário
            var username= document.getElementById("username").value
            var password= document.getElementById("password").value


            //percorrer todos os objetos do usuário e confirmar se o nome de usuário e password estao certos
            for(i = 0;i < objPeople.length;i++) {
                if (username==objPeople[i].username && password == objPeople[i].password){
                    console.log(username + " está logado !");
                    window.open('loginfeitoindex.html');
                    return

                }

            }
            //erro se o nome de usuario e password não derem match
            alert('Login Errado')
}
function registerUser(){

    var registerUser= document.getElementById("newUser").value
    var registerPassword= document.getElementById("newPassword").value
    var newUser = {
        username: registerUser,
        password: registerPassword
    }
    for(i = 0;i < objPeople.length;i++){
        if(registerUser == objPeople[i].username){
            alert("Este nome de utilizador já esta a ser utilizado")
            return
        }else if(registerPassword.length<8) {
            alert("Palavra passe muito curta, insira pelo menos 8 carateres")
            return
        }
        console.log(registerUser + " está registado!");

    }



    objPeople.push(newUser)
    console.log(objPeople)



}