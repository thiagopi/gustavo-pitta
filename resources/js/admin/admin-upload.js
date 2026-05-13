let form = document.querySelector("#formUpload");
//
function sendForm(){
    let form = document.querySelector("#formUpload");
    let uploadFile = form.querySelector('input[name="uploadFile"]');
    let category = form.querySelector('select[name="cbCategory"]');
    let text_picture = form.querySelector('input[name="text_picture"]');
    // console.log(inputUploadFile);
    // return false;
    let formData = new FormData();
    formData.append('uploadFile', uploadFile.files[0]);
    formData.append('category', category.value);
    formData.append('text_picture', text_picture.value);
    // console.log(formData);
    // return false;
    let jsonObject = {};
    for (const [key, value] of formData.entries()) {
        jsonObject[key] = value;
    }
    // console.log(jsonObject);
    // return false;
    // console.log(this.state.formID);
    //
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    //
    let data = {
        method: 'POST',
        body: formData
    };
    //
    fetch(baseURL + 'admin/postUpload/', data)
        .then(res => res.json())
        .then(
            (rs) => {
                showAlert('success', rs.msg);
            },
            //
            (error) => {
                console.log('error: ', error);
                alert(error);
            }
        ).then(
            () => {
                blockui.classList.remove('active');
            }
        );
    
}

function validateForm(){
    let cbCategory = form.querySelector('select[name="cbCategory"]');
    if(cbCategory.value === ""){
        showAlert('error', 'Selecione uma categoria');
        cbCategory.focus();
        return false;
    }
    sendForm();
    return true;
}

/* ************************************************************
                       document ready
************************************************************ */
document.addEventListener('DOMContentLoaded', () => {
    const btnUpload = document.querySelector('#uploadFile');

    btnUpload.addEventListener('click', () => {
        let cbCategory = form.querySelector('select[name="cbCategory"]');
        if(cbCategory.value === ""){
            showAlert('error', 'Selecione uma categoria');
            cbCategory.focus();
            return false;
        }
    }, false);
    btnUpload.addEventListener('change', validateForm, false);
}, false);