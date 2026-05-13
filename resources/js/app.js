let sw = window.innerWidth;
let sh = window.innerHeight;
//
let timeAlert; // Time for alert window
let currentAlertWindow = null;
//
var fn = new Utils();
//
function appResize(){
    // var elemToCenter = document.querySelector('.content-out.center .content-in');
    // var contentHeight = elemToCenter.offsetHeight;
    // if(contentHeight < sh){
    //     elemToCenter.parentElement.style.height = 'height', sh + 'px';
    // }else{
    //     elemToCenter.parentElement.style.height = 'height', 'auto';
    // }
}
//
/*
    OPEN MENU
*/
function openMenu(){
    let menu = document.querySelector('.nav-slider');
    menu.classList.add('active');
}
/*
    CLOSE MENU
*/
function closeMenu(){
    let menu = document.querySelector('.nav-slider');
    menu.classList.remove('active');
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

*/
function goTop(){
    let cover = document.querySelector('#cover');
    cover.scrollIntoView({ behavior: 'smooth' });
}

/* ************************************************************
                       document ready
************************************************************ */
document.addEventListener('DOMContentLoaded', function(){
    appResize();
}, false);


/* ************************************************************
                         window resize
************************************************************ */
// window.addEventListener('resize', appResize, false);