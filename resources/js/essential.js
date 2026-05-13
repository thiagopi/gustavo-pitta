let sw = window.innerWidth;
let sh = window.innerHeight;
//
let timeAlert; // Time for alert window
let currentAlertWindow = null;
//

//
var fn = new Utils();
//
if(typeof base_url === 'undefined'){
    var base_url = "./";
}

function windowResize() {
    sw = window.innerWidth;
    sh = window.innerHeight;
    //
}

/*
    Close ALERT
*/
function closeAlert() {
    const alert = document.querySelector('.alert');
    alert.classList.remove('active');
    // $('.alert').removeClass('active');
    clearInterval(timeAlert);
}

function autoCloseAlert() {
    
    // setTimeout(function(){ closeAlert(); }, 5000);
    clearInterval(timeAlert);
    timeAlert = setInterval(closeAlert, 4000);
    // clearInterval(timeAlert);
}


/*
    Show ALERT
*/
function showAlert(type, msg){
    const alert = document.querySelector('.alert');
    const h3 = alert.querySelector('h3');
    
    let classes = ['success', 'warning', 'error'];
    for(let i = 0; i < classes.length; i++){
        alert.classList.remove(classes[i]);
    }
    alert.classList.add('active');
    alert.classList.add(type);
    h3.innerHTML = msg;
    //
    autoCloseAlert();
}

/*
    Start on document ready
*/
function init() {
    windowResize();

    const body = document.querySelector('body');
    const alert = document.querySelector('.alert');
    let btnShowModal = document.querySelectorAll('.btn-show-modal');

    // Click to close alert window
    const btnAlertClose = alert.querySelector('.btn-close');
    btnAlertClose.addEventListener('click', (evt) => {
        evt.preventDefault();
        closeAlert(this);
    });

    // Hold alert window
    alert.addEventListener('mouseenter', () => {
        clearInterval(timeAlert);
    });

    // Release alert window
    alert.addEventListener('mouseleave', () => {
        clearInterval(timeAlert);
        timeAlert = setInterval(closeAlert, 2000);
    });
    // console.log(btnShowModal);
    // Open Modal
    btnShowModal.forEach((elem) => {
        elem.addEventListener('click', (evt) => {
            const dataModal = elem.dataset.modal;
            const modal = document.querySelector('#' + dataModal);
            modal.classList.add('active');
            body.classList.add('overflow-hidden');
        });
    });
    
    // Close Modal
    let btnsCloseModal = document.querySelectorAll('.modal .btn-close');
    btnsCloseModal.forEach((elem) => {
        elem.addEventListener('click', () => {
            elem.parentElement.parentElement.parentElement.parentElement.classList.remove('active');
            document.querySelector('body').classList.remove('overflow-hidden');
        }, false);
    });
    // $('.modal .btn-close').on('click', function(){
    //     console.log($(this));
    //     $(this).parent().parent().parent().parent().removeClass('active');
    //     $('body').removeClass('overflow-hidden');
    // });
    
    // TOOLTIP
    // $('body').on('mouseenter', '.show-tooltip', function(){
    //     if(typeof $(this).data('tooltip')){
    //         var tooltip = $('#tooltip');
    //         // set text
    //         var text = $(this).data('tooltip');
    //         tooltip.html(text);
    //         // set position
    //         var elemPosX = $(this).offset().left;
    //         var elemPosY = $(this).offset().top;
    //         var elemWidth = $(this).outerWidth();
    //         var elemHeight = $(this).outerHeight();
    //         var tooltipWidth = tooltip.outerWidth();
    //         var tooltipPosX = elemPosX + (elemWidth / 2) - (tooltipWidth / 2);
    //         var tooltipPosY =  elemPosY + elemHeight + 2;
    //         tooltip.offset({top:tooltipPosY, left:tooltipPosX});
    //         // console.log(elemPosX);
    //         // show tooltip
    //         tooltip.addClass('active');
    //     }
    // });
    // $('.show-tooltip').on('mouseleave', function(){
        
    //     $('#tooltip').removeClass('active');
    // });
}


document.addEventListener('DOMContentLoaded', init, false);