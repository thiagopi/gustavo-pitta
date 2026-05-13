// var fn = new Utils();
//

function sendPost(){
    let json = {
        'user_name': 'Felipe Sem Conta Bancaria',
        'user_email': 'felipe.silva+semcc@vee.digital',
        'user_document': '69386846004',
        'user_phone_number': '11111111111',
        'user_type': 1,
        'bill_description': 'Aééééé',
        'bill_barcode': '34191579812286774156764072330000179210000040000',
        'bill_due': '2019-06-06T03:00:00.000Z',
        'bill_total_ammount': '400.00',
        'bill_document_ammount': '400.00',
        'bill_id': 1,
        'bill_bank_id': '341',
        'bill_discount': '2.10',
        'bill_late_payment_interest': '3.00',
        'bill_fine': '1.00',
        'bill_total_charges': '4.00'
    };

    // json = JSON.stringify(json);
    let id = '#form';
    // const form = document.querySelector()
    //
    canSubmit = false;
    //
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    console.log(blockui);
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
        },
        body: JSON.stringify(jsonObject)
        // body: jsonObject
        // mode: 'cors',
        // cache: 'default'
    };
    //
    fetch(baseURL + 'test/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                // console.log('result: ', rs);
                if(rs.result === 1){
                   
                    // window.location.href = './obrigado/';
                }
                alert(rs.msg);
                blockui.classList.remove('active');
            },
            //
            (error) => {
                console.log('error: ', error);
                blockui.classList.remove('active');
                alert(error);
            }
        );
}
/* ************************************************************
                       document ready
************************************************************ */
document.addEventListener('DOMContentLoaded', function(){
    
}, false);
