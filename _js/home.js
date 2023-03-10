function editarLabel(id){

    //Captura dos elementos que estão no HTML
    let label = document.getElementById(id); //Pega o elemento h1 ou h6 a partir do id
    let edit_button = document.getElementById(`button-${id}`); //Pega o elemento Button a partir do id, o que possui o ícone de editar  

    //Criação dos elementos que substituirão os anteriores
    let input = document.createElement('input'); //Cria o elemento Input
    input.className = "form-control me-1" //Coloca o estilo Bootstrap no elemento
    input.value = label.innerHTML; //Coloca o valor do label no valor do input

    let confirm_button = document.createElement('button'); //Cria o elemento Button
    let confirm_icon = document.createElement('i'); //Cria o elemento I, o ícone
    confirm_button.className = "btn btn-success btn-lg me-1"; //Coloca o estilo Bootstrap no elemento, botão large e success
    confirm_button.onclick = function () {
        label.innerHTML = input.value;
        input.parentNode.replaceChild(label, input);
        
        cancel_button.parentNode.removeChild(confirm_button);

        cancel_button.parentNode.replaceChild(edit_button, cancel_button);
    }
    confirm_icon.className = "bi bi-check-circle"; //Coloca o estilo Bootstrap no elemento, o ícone de confirmação
    confirm_button.appendChild(confirm_icon); //insere o ícone de confirmação dentro do button success

    let cancel_button = document.createElement('button');
    let cancel_icon = document.createElement('icon');
    cancel_button.className = "btn btn-outline-danger btn-lg";
    cancel_button.onclick = function () {
        input.parentNode.replaceChild(label, input);
        
        cancel_button.parentNode.removeChild(confirm_button);

        cancel_button.parentNode.replaceChild(edit_button, cancel_button);
    }
    cancel_icon.className = "bi bi-x-circle";
    cancel_button.appendChild(cancel_icon);

    //Substituição de elementos
    label.parentNode.replaceChild(input, label); //troca o h1 ou h6 pelo input 

    edit_button.parentNode.insertBefore(confirm_button, edit_button);//insere o botão de confirmação antes do botão de editar

    edit_button.parentNode.replaceChild(cancel_button, edit_button); //troca o botão com o ícone de editar pelo botão com o ícone de cancelar

}