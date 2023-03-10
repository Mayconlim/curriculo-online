function logar(){
    let email = document.getElementById("email")
    let senha = document.getElementById("senha")

    if (email.value == "admin@gmail.com" && senha.value == "admin"){
        window.location = "./home.html"
        return
    }

    let alert = document.getElementsByClassName('alert')[0]
    alert.style = "display: inline"

    email.classList.add('is-invalid');
    senha.classList.add('is-invalid')
    senha.value = ''
}