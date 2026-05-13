let btnLogout = document.querySelector('.logo');
btnLogout.addEventListener('click', logout, false);

function logout(){
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    //
    let dataInit = {
        method: 'POST',
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
        }
    };
    //
    fetch(baseURL  + 'admin/postLogout/', dataInit)
        .then(res => res.json())
        .then(
            (rs) => {
                console.log('result: ', rs);
                if(rs.result === 1){
                    
                    blockui.classList.remove('active');
                    showAlert('success', rs.msg);
                    window.location.href = baseURL  + 'admin/login/'
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