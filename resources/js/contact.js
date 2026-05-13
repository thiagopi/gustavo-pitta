let form = document.querySelector('form[name="formContact"]');

document.addEventListener('DOMContentLoaded', initContact, false);
//
function initContact(){
    fn.setMasks('phone_number', document.querySelector('#formContact input[name="mobile"]'));
    //
    // let name = form.querySelector('input[name="name"]').value = "Thiago";
    // let email = form.querySelector('input[name="email"]').value = "thiago@thiagopi.com.br";
    // let mobile = form.querySelector('input[name="mobile"]').value = "(11) 98745-5935";
    // let subject = form.querySelector('input[name="subject"]').value = "Teste";
    // let message = form.querySelector('textarea[name="message"]').value = "Mensagem de teste ááéé";
}
// SEND FORM
function sendForm(){
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    //
    const formData = new FormData(form);
    let jsonObject = {};
    for (const [key, value] of formData.entries()) {
        jsonObject[key] = value;
    }
    // console.log(jsonObject);
    // form.forEach((elem) => {
    //     console.log(elem);
    // })
    // return false;
    //
    // let myHeaders = new Headers();
    // console.log(blockui);
    let dataInit = {
        method: 'POST',
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
            // "Content-type": "application/x-www-form-urlencoded"
        },
        body: JSON.stringify(jsonObject),
        async: false,
        // mode: 'cors',
        // cache: 'default'
    };
    // console.log(dataInit);
    //
    // fetch('https://sujeitoprogramador.com/rn-api/?api=posts', dataInit)    
    // fetch('http://localhost/veewebreactjs/services/test.php', dataInit)
    fetch(baseURL  + 'postContact/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                // console.log('result: ', rs);
                if(rs.result === 1){
                    showAlert('success', rs.msg);
                    let name = form.querySelector('input[name="name"]').value = "";
                    let email = form.querySelector('input[name="email"]').value = "";
                    let mobile = form.querySelector('input[name="mobile"]').value = "";
                    let subject = form.querySelector('input[name="subject"]').value = "";
                    let message = form.querySelector('textarea[name="message"]').value = "";
                }else{
                    showAlert('error', rs.msg);
                }
                blockui.classList.remove('active');
            },
            //
            (error) => {
                // console.log('error: ', error);
                alert(error);
                blockui.classList.remove('active');
            }
        ).catch(error => {
            alert(error);
            blockui.classList.remove('active');
        })
}

function validateForm(){
    
    let name = form.querySelector('input[name="name"]');
    let email = form.querySelector('input[name="email"]');
    let mobile = form.querySelector('input[name="mobile"]');
    let subject = form.querySelector('input[name="subject"]');
    let message = form.querySelector('textarea[name="message"]');
    //
    // console.log(name);
    //
    if(name.value === ''){
        name.focus();
        showAlert('error', "O campo NOME é obrigatório.");
        return false;
    }
    if(!fn.verifyEmail(email.value)){
        email.focus();
        showAlert('error', "Por favor digite um endereço de E-MAIL válido.");
        return false;
    }
    if(mobile.value === ''){
        mobile.focus();
        showAlert('error', "O campo TELEFONE é obrigatório.");
        return false;
    }
    if(subject.value === ''){
        subject.focus();
        showAlert('error', "O campo ASSUNTO é obrigatório.");
        return false;
    }
    if(message.value === ''){
        message.focus();
        showAlert('error', "O campo MENSAGEM é obrigatório.");
        return false;
    }
    //
    this.sendForm();
    return true;
}