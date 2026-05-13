let form = document.querySelector('form[name="formPortfolioEdit"]');
// console.log(form);
let btnSave = document.querySelector('.btn-save');
btnSave.onclick = function(){
    savePortfolio();
}

function savePortfolio(){
    let blockui = document.querySelector('.blockui');
    // blockui.classList.add('active');
    // console.log(document.querySelectorAll('.tbl-pictures tbody tr').length);
    let tr = document.querySelectorAll('.tbl-pictures tbody tr');
    let total_tr = tr.length;
    let arr = [];
    // let 
    tr.forEach((elem, idx) => {
        let input = elem.querySelectorAll('input');
        let t = {};
        input.forEach((elem) => {
            // console.log(elem.dataset.prop);
            // console.log(elem.value);
            switch(elem.dataset.prop){
                case "id":
                    t.id_picture = elem.value;
                    break;

                case "text":
                    t.s_text1 = elem.value;
                    break;

                case "position":
                    t.position = elem.value;
                    break;
            }
        });
        arr.push(t);
        // console.log(t);
    });
    //
    let dataInit = {
        method: 'POST',
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
            // "Content-type": "application/x-www-form-urlencoded"
        },
        body: JSON.stringify(arr)
        // mode: 'cors',
        // cache: 'default'
    };
    //
    fetch(baseURL  + 'admin/postPortfolio/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                // console.log('result: ', rs);
                if(rs.result === 1){
                    showAlert('success', rs.msg);
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
        )
}

// Remove picture
function removePicture(obj, id){
    if (!window.confirm("Você que quer remover esta foto?")) { 
        return false;
    }
    //      
    let blockui = document.querySelector('.blockui');
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
        body: JSON.stringify({id: id})
        // mode: 'cors',
        // cache: 'default'
    };
    //
    fetch(baseURL  + 'admin/postRemove/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                // console.log('result: ', rs);
                if(rs.result === 1){
                    showAlert('success', rs.msg);
                    obj.parentElement.remove();
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
        )
}

document.addEventListener('DOMContentLoaded', initAdminPortfolio, false);

function initAdminPortfolio(){
    let wrapper = document.querySelector('.sortable');
    new Sortable(wrapper, {
        animation: 150,
        ghostClass: 'blue-background-class',
        onEnd: function(evt){
            let items = evt.target.querySelectorAll('.single-wrapper');
            //
            items.forEach( (elem, idx) => {
                // elem.dataset.position = idx + 1;
                elem.querySelector('.position').value = idx + 1;
            })
        }
    });
}

