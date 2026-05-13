let form = document.querySelector('form[name="formLogin"]');
let inputPassword = form.querySelector('input[type="password"]');
inputPassword.addEventListener('keyup', (evt) => {
    console.log("sdsaasf");
    if(evt.keyCode === 13){
        evt.preventDefault();
        validateForm();
    }
});

function sendForm(){
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    //
    const formData = new FormData(form);
    let jsonObject = {};
    for (const [key, value] of formData.entries()) {
        jsonObject[key] = value;
    }
    //
    let dataInit = {
        method: 'POST',
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
            // "Content-type": "application/x-www-form-urlencoded"
        },
        body: JSON.stringify(jsonObject)
        // mode: 'cors',
        // cache: 'default'
    };
    //
    fetch(baseURL  + 'admin/postLogin/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                console.log('result: ', rs);
                if(rs.result === 1){
                    
                    blockui.classList.remove('active');
                    showAlert('success', rs.msg);
                    window.location.href = baseURL  + 'admin/gastronomia/'
                }else{
                    showAlert('error', rs.msg);
                    blockui.classList.remove('active');
                }
            },
            //
            (error) => {
                console.log('error: ', error);
                alert(error);
                blockui.classList.remove('active');
            }
        )
}

function validateForm(){
    let username = form.querySelector('input[name="username"]');
    let password = form.querySelector('input[name="password"]');
    //
    if(username.value === ""){
        username.focus();
        showAlert('error', 'Digite um nome de usuário válido.');
        return false;
    }
    if(password.value === ""){
        password.focus();
        showAlert('error', 'Digite uma senha válida.');
        return false;
    }
    //
    sendForm();
    return true;
}