function pegar_labels(id){
    let label = document.getElementById(id);
    let estado1 = document.getElementById(`estado1-${id}`);
    let input = document.getElementById(`input-${id}`);
    let estado2 = document.getElementById(`estado2-${id}`);
    let form_input = document.getElementById(`form-${id}`);

    return [label, estado1, input, estado2, form_input];
}

function editar_label(id, action){
    let [label, estado1, input, estado2, form_input] = pegar_labels(id);

    if(action == "save"){
        label.innerHTML = input.value;
        form_input.value = input.value;
    } else{
        input.value = label.innerHTML;
        form_input.value = label.innerHTML;
    }

    if(action == "cancel" || action == "save"){
        estado1.classList.replace("d-none", "d-flex");
        estado2.classList.replace("d-flex", "d-none");
    }else{
        estado1.classList.replace("d-flex", "d-none");
        estado2.classList.replace("d-none", "d-flex");
    }
}

function mensagem_modal(type){
    let modal_body = document.getElementsByClassName("modal-body")[0];
    let modal_button_submit = document.getElementById("modal-button-submit");
    let form_action = document.getElementById("form-action");

    if(type == "deletar"){
        modal_body.innerHTML = "Tem certeza que você realmente quer excluir essa conta?";
        modal_button_submit.innerHTML = "Deletar";
        modal_button_submit.classList.length < 2?
            modal_button_submit.classList.add("btn-danger")
            :
            modal_button_submit.classList.replace("btn-success", "btn-danger");
        form_action.value = "deletar";
    } else if (type == "salvar"){
        modal_body.innerHTML = `Tem certeza que deseja salvar as alterações?<br>
        <strong>Os dados anteriores serão sobreescritos e não poderão ser recuperados</strong>.`;
        modal_button_submit.innerHTML = "Salvar";
        modal_button_submit.classList.length < 2?
            modal_button_submit.classList.add("btn-success")
            :
            modal_button_submit.classList.replace("btn-danger", "btn-success");
        form_action.value = "salvar";
    }
}