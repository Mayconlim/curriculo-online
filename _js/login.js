function logar(){
    let email = document.getElementById("email")
    let senha = document.getElementById("senha")

    let alert = document.getElementsByClassName('alert')[0]
    alert.style = "display: inline"

    email.classList.add('is-invalid')
    senha.classList.add('is-invalid')
    senha.value = ''
}