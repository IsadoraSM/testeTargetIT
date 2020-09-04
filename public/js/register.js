//verifica se o usuário preencheu o nome completo
function validateName(){
    const name = document.getElementById("name");

    const check = name.value.split(" ");

    const invalidName = document.getElementById("invalidName");

    const button = document.getElementById("submitRegister");

    if(check.length == 1){
        name.classList.add('is-invalid');
        invalidName.removeAttribute('hidden');
        button.disabled = true;

    }else if(check[1].length < 3) {
        name.classList.add('is-invalid');
        invalidName.removeAttribute('hidden');
        button.disabled = true;

    }else{
        name.classList.remove('is-invalid');
        invalidName.setAttribute('hidden', 'hidden');
        button.disabled = false;
    }
}