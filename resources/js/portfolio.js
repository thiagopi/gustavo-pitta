let cat, range = 0, factor = 10, oldRange;
//
// document.addEventListener('DOMContentLoaded', initPortfolio, false);

// function initPortfolio(){
//     setRange(range);
// }

function loadMore(_c){
    cat = _c;
    setRange(range);
}

function setRange(_range){
    //
    oldRange = range;
    range += factor;
    //
    sendLoadMore();
    return range;
}
//
function setCategory(_c){
    let categoryName;
    //
    switch(_c){
        case 1:
            categoryName = 'gastronomia';
            break;
            
        case 2:
            categoryName = 'joias';
            break;
            
        case 3:
            categoryName = 'still';
            break;
        
        case 4:
            categoryName = 'retratos';
            break;
        
        case 5:
            categoryName = 'moda';
            break;
        
        case 6:
            categoryName = 'ambiente-e-decoracao';
            break;

    }
    //
    return categoryName;
}

// SEND FORM
function sendLoadMore(){
    let blockui = document.querySelector('.blockui');
    blockui.classList.add('active');
    //
    let jsonObject = { 
        "cat": cat,
        "range": range
    };
    //
    let data = {
        method: 'POST',
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
            // "Content-type": "application/x-www-form-urlencoded"
        },
        body: JSON.stringify(jsonObject)
    };
    //
    fetch(baseURL  + 'postPortfolioLoadMore/', data)
        .then(res => res.json())
        .then(
            (rs) => {
                console.log(rs);
                if(rs.result === 1){
                    if(rs.obj){
                        rs.obj.forEach(elem => {
                            let file = elem.s_file;
                            let text = elem.s_text1;
                            let domElement = document.querySelector('.wrapper');
                            //
                            let categoryName = setCategory(cat);
                            
                            let path = baseURL + 'resources/images/portfolio/' + categoryName + '/' + file;
                            let html;
                            if(text !== ""){
                                html = `
                                    <div class="cat">
                                        <img src="${path}" alt="${text}" />
                                        <h3>${text}</h3>
                                    </div>
                                `;
                            }else{
                                html = `
                                    <div class="cat">
                                        <img src="${path}" alt="${text}" />
                                    </div>
                                `;
                            }
                            
                            //
                            domElement.insertAdjacentHTML('beforeend', html);
                            // console.log(elem.s_file);
                        });
                    }else{
                        // console.log( document.querySelector('.btn-loadMore').parentElement);
                        document.querySelector('.btn-loadMore').parentElement.remove();
                    }

                }else{
                    showAlert('error', rs.msg);
                    range = oldRange;
                }
                blockui.classList.remove('active');
            },
            //
            (error) => {
                // console.log('error: ', error);
                range = oldRange;
                alert(error);
                blockui.classList.remove('active');
            }
        )
}