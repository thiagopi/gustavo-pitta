/**
 * author: Thiago Pereira Idehama
 * version: 1.5.1
 */
class Utils {

    constructor() {

        /*
            Create ALERT div
        */
        let div = document.createElement("div");
        div.classList.add('alert');
        let h3 = document.createElement("h3");
        let div2 = document.createElement("div");
        div2.classList.add('btn-close');
        div.appendChild(h3);
        div.appendChild(div2);
        document.body.appendChild(div);

        /*
            Create TOOLTIP div
        */
       let tooltip = document.createElement("div");
       tooltip.setAttribute('id', 'tooltip');

       let myBody = document.getElementsByTagName('body');
       document.body.insertBefore(tooltip, document.body.firstChild);
    }

    /*
        Get IE version
    */
    getInternetExplorerVersion() {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null) {
                rv = parseFloat(RegExp.$1);
            }
        }
        return rv;
    }
    escIE8() {
        var ver = getInternetExplorerVersion();
        if (ver > -1) {
            if (ver < 9.0) {
                return true;
            }
        }
    }

    /*
        Verify if is Android
    */
    isAndroid() {
        // Detectar Device
        var ua = navigator.userAgent.toLowerCase();
        var itIs = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

        return itIs;
    }
    
    /*
        Verify if is iOS
    */
    isiOS() {
        // Detectar Device
        var ios = /iPad|iPhone|iPod/.test(navigator.userAgent);

        // Another way is relying on navigator.platform:
        // var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);

        return ios;
    }

    /*
        Remove hashtag from url bar
    */
    clearURL(symbol) {
        var ver = this.getInternetExplorerVersion();
        // console.log("ie version: " + ver);
        if (ver > -1) {
            if (ver < 10.0) {
                // console.log('IE 9 pra baixo');
                // remove fragment as much as it can go without adding an entry in browser history:
                window.location.replace(symbol);
                // slice off the remaining '#' in HTML5:    
                if (typeof window.history.replaceState == 'function') {
                    history.replaceState({}, '', window.location.href.slice(0, -1));
                }
            } else {
                // console.log('bbbbbb');
                history.pushState("", document.title, window.location.pathname);
            }
        } else {
            // console.log('bbbbbb');
            history.pushState("", document.title, window.location.pathname);
        }
        // return this;
    }

    /*
        Remove all not number
    */
    clearString(s) {
        // console.log('s: ' + s);
        var str = s;
        str = str.replace(/\D/g,'');
        // str = str.replace(".", "");
        // str = str.replace(",", "");
        // str = str.replace("/", "");
        // str = str.replace("-", "");

        return str;
    }

    /*
        Deixar o CNPJ só com os números
    */
    limparCNPJ(cnpj) {
        var str = this.remove(cnpj, '.');
        str = this.remove(str, '/');
        str = this.remove(str, '-');

        return str;
    }
    /*
        Get PHP variables from URL
    */
    getUrlVars(phpvar) {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var c = url.searchParams.get(phpvar);
        return c;
    }

    /*
        String capitalize
    */
    capitalize(str) {
        var s = str.toLowerCase();
        s = s.replace(/\b\w/g, l => l.toUpperCase());
        // s = str[0].toUpperCase() + str.slice(1);
        s = s.replace(" De ", " de ");
        s = s.replace(" Da ", " da ");
        s = s.replace(" Do ", " do ");
        s = s.replace(" Em ", " em ");
        s = s.replace(" Sao ", " São ");
        s = s.replace("Sao ", "São ");
        s = s.replace("R ", "R. ");
        s = s.replace("Av ", "Av. ");
        s = s.replace("Al ", "Al. ");
        s = s.replace("Braganca", "Bragança");
        s = s.replace("Tatuape", "Tatuapé");
        //
        return s;
    }
    // /*
    //     usernameGenerate
    // */
    // usernameGenerate(ncr, ddd, reseller,){

    // }
    /*

    */
    set isNumeric(sText) {

        var validChars = "0123456789.-Rr";

        var isNumber = true;

        var char;

        for (i = 0; i < sText.length && isNumber == true; i++) {

            char = sText.charAt(i);

            if (validChars.indexOf(char) == -1) {

                isNumber = false;

            }

        }

        return (isNumber && (sText.length > 0));

    }
    
    /*
        Verify if string has only numbers
    */
    isOnlyNumbers(sText) {
        // var sText;
        var validChars = "0123456789";

        var isNumber = true;

        var char;

        sText += "";

        for (var i = 0; i < sText.length && isNumber == true; i++) {

            char = sText.charAt(i);

            if (validChars.indexOf(char) == -1) {

                isNumber = false;

            }

        }

        return (isNumber && (sText.length > 0));

    }

    /*
        TRIM
    */
    trim(aString) {
        return aString.replace(/^\s+/, "").replace(/\s+$/, "");
    }

    /*
        Remove from string
    */
    remove(str, sub) {
        if (str) {
            var i = str.indexOf(sub);
        } else {
            var i = -1;
        }
        var r = "";
        if (i == -1) return str;
        r += str.substring(0, i) + this.remove(str.substring(i + sub.length), sub);
        return r;
    }

    /*

    */
    padZeros(num, size) {
        var s = num + "";
        while (s.length < size) s = "0" + s;
        return s;
    }

    /*
        Verify valid e-mail address
    */
    verifyEmail(email) {
        return /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/.test(this.trim(email));
    }

    /*
        Verify valid CPF number
    */
   verifyCPF(cpf) {
        var CPF = this.remove(cpf, ".");
        CPF = this.remove(CPF, "-");
        CPF = this.padZeros(CPF, 11);
        if (CPF.length != 11 || CPF == "00000000000" || CPF == "11111111111" ||
            CPF == "22222222222" || CPF == "33333333333" || CPF == "44444444444" ||
            CPF == "55555555555" || CPF == "66666666666" || CPF == "77777777777" ||
            CPF == "88888888888" || CPF == "99999999999")
            return false;
        var soma = 0;
        for (var i = 0; i < 9; i++)
            soma += parseInt(CPF.charAt(i), 10) * (10 - i);
        var resto = 11 - (soma % 11);
        if (resto == 10 || resto == 11)
            resto = 0;
        if (resto != parseInt(CPF.charAt(9), 10))
            return false;
        soma = 0;
        for (var i = 0; i < 10; i++)
            soma += parseInt(CPF.charAt(i), 10) * (11 - i);
        resto = 11 - (soma % 11);
        if (resto == 10 || resto == 11)
            resto = 0;
        if (resto != parseInt(CPF.charAt(10), 10))
            return false;
        return true;
    }

    /*
        MASKS
    */
    setMasks(type, field) {
        function mascara(obj, fn) {
            var v_obj = obj;
            var v_fun = fn;
            v_obj.value = v_fun(v_obj.value);
        }

        // CEP
        function mcep(v) {
            if(v.length > 9){
                v = v.slice(0, -1);
            }
            //
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d{5})(\d)/, "$1-$2"); //Esse é tão fácil que não merece explicações
            return v;
        }
        // CNPJ
        function mcnpj(v) {
            // console.log(v);
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d)/, "$1.$2"); //Coloca ponto entre o segundo e o terceiro dígitos
            v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
            v = v.replace(/\.(\d{3})(\d)/, ".$1/$2"); //Coloca uma barra entre o oitavo e o nono dígitos
            v = v.replace(/(\d{4})(\d)/, "$1-$2"); //Coloca um hífen depois do bloco de quatro dígitos
            //
            if(v.length > 18){
                v = v.slice(0, -1);
            }
            //
            return v;
        }
        //CPF
        function mcpf(v) {
            if(v.length > 14){
                v = v.slice(0, -1);
            }
            //
            v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
            v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
            v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
            //de novo (para o segundo bloco de números)
            v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
            //
            return v;
        }
        // Document (CPF and CNPJ)
        function mdocument(v) {
            if(v.length <= 14){
                v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
                v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
                v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
                //de novo (para o segundo bloco de números)
                v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
                return v;
            }else if(v.length > 14 && v.length < 19){
                v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
                v = v.replace(/^(\d{2})(\d)/, "$1.$2"); //Coloca ponto entre o segundo e o terceiro dígitos
                v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
                v = v.replace(/\.(\d{3})(\d)/, ".$1/$2"); //Coloca uma barra entre o oitavo e o nono dígitos
                v = v.replace(/(\d{4})(\d)/, "$1-$2"); //Coloca um hífen depois do bloco de quatro dígitos
                return v;
            }
            else{
                return v.replace(v, v.slice(0, -1));
            }
            
            
        }
        // DATA
        function mdate(v) {
            if(v.length > 10){
                v = v.slice(0, -1);
            }
            //
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/(\d{2})(\d)/, "$1/$2");
            v = v.replace(/(\d{2})(\d)/, "$1/$2");
        
            v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
            return v;
        }
        // TELEFONE (preparado para o nono dígito)
        function mtel(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d\d)(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            // console.log(v.length);
            if (v.length < 14) {
                v = v.replace(/(\d{4})(\d)/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
            } else {
                v = v.replace(/(\d{5})(\d)/, "$1-$2"); //Coloca hífen entre o quinto e o sexto dígitos
            }
            //
            if(v.length > 15){
                v = v.slice(0, -1);
            }
            //
            return v;
        }
        // Moeda Real
        function mmoedareal(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            // v = v.replace(/[^0-9-]/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/([0-9-]{2})$/g, ",$1");
            if( v.length > 6 ){
                v = v.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                // v = v.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }
            //
            return v;
        }
        
        
        // Aplicar a máscara nas IDs e seu tipo
        
        
        switch(type){
            
            case "phone_number":
                field.addEventListener('keyup', () => {
                    mascara(field, mtel);
                });
                break;

            case "cnpj":
                field.addEventListener('keyup', () => {
                    mascara(field, mcnpj);
                });
                break;

            case "cpf":
                field.addEventListener('keyup', () => {
                    mascara(field, mcpf);
                });
                break;
           
            case "document":
                field.addEventListener('keyup', () => {
                    mascara(field, mdocument);
                });
                break;

            case "cep":
                field.addEventListener('keyup', () => {
                    mascara(field, mcep);
                });
                break;

            case "date":
                field.addEventListener('keyup', () => {
                    mascara(field, mdate);
                });
                break;

            case "currency_real":
                field.addEventListener('keyup', () => {
                    mascara(field, mmoedareal);
                });
                break;
        }
    }

    /*
        Set COOKIE
    */
    setCookie(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value = escape(value) + ((exdays == null) ? "" : "; path=/; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value;
    }

    /*
        Get COOKIE
    */
    getCookie(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
            c_value = null;
        } else {
            c_start = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length;
            }
            c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
    }

    /*
        Unset COOKIES
    */
    unsetCookie(c_name) {
        document.cookie = document.cookie = c_name + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }


    /*
        Scroll page to specific content ID
    */
    // var ativaScroll = true;
    goCont(id, diff = 0) {
        let elem = document.querySelector(id);
        console.log(elem);
        if (elem.id) {
            var dif = diff;
            //
            $('html, body').animate({
                scrollTop: ($(id).offset().top - dif)
            }, 700, function () {
                // Animation complete.
            });
        }

    }
    // Parallax
    parallax() {
        var $obj; // é uma variável que armazena o valor $(this) que por sua vez faz relação a todo elemento que possua a classe .parallax
        //
        $('.parallax').each(function () {
            $obj = $(this);
            var offset = $obj.offset();
            var desloc = -($(window).scrollTop() - offset.top) / 2;
            // console.log('desloc: ' + desloc);
            $($obj).css("background-position", "left " + desloc + "px");
        });
    }

    // Gerador de senha
    passwordGenerate(_qtd = 12, _numbers = true, _lower = true, _upper = true, _symbols = true) {
        const upper = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        let lower = [];
        for (let i = 0; i < upper.length; i++) {
            lower.push(upper[i].toLowerCase());
        }
        const symbols = ["!", "@", "#", "%", "&", "*"];
        const numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        let strArray = [];
        // console.log(lower);
        //
        if (_numbers) strArray = strArray.concat(numbers);
        if (_lower) strArray = strArray.concat(lower);
        if (_upper) strArray = strArray.concat(upper);
        if (_symbols) strArray = strArray.concat(symbols);
        //
        let qtd = _qtd;
        let str = "";
        let rand = '';
        for (let i = 0; i < qtd; i++) {
            if (i <= 1) {
                rand = Math.floor(Math.random() * upper.length);
                str = str + upper[rand];
            } else {
                rand = Math.floor(Math.random() * numbers.length);
                str = str + numbers[rand];
            }
            // let rand = Math.floor(Math.random() * strArray.length);

            // console.log(str);
            // $(".copiar-senha").html(str);
            // document.execCommand("Copy");
        }
        return str;
    }

    testRepeater() {
        var tt = [];
        var b = false;
        var _c = this.gerarSenha(8, true, false, true, false);
        tt.push(_c);
        console.log(tt);

        // while(b == false){
        //     var _c = gerarSenha(8, true, false, true, false);
        //     tt.concat(_c)
        // }


    }

    /*
        Verificar senha
    */
    checkPassword(str, tipo) {
        switch (tipo) {
            case 'number':
                var hasNumber = str.match(/[0-9]/g);
                return hasNumber;

            case 'uppercase':
                var hasUppercase = str.match(/[A-Z]/g);
                return hasUppercase;

            case 'lowercase':
                var hasLowercase = str.match(/[a-z]/g);
                return hasLowercase;

            case 'symbol':
                var hasSymbol = str.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/);
                return hasSymbol;

            case 'repeat':
                var hasSymbol = str.match(/(\d)\1{2}/); // retorna true a partir de 3 repetições
                return hasSymbol;
        }
        //
        return true;
    }
    
    /*
        DRAG SCROLL
    */
    hasScroll(el, direction) {
        direction = (direction === 'vertical') ? 'scrollTop' : 'scrollLeft';
        var result = !! el[direction];

        if (!result) {
            el[direction] = 1;
            result = !!el[direction];
            el[direction] = 0;
        }
        return result;
    }
    scrollLeft(elem) {
        $(elem).css('cursor', 'url("images/cursor-move.png"), auto');
        $(elem).mousedown(function (event) {
            $(this)
                .data('down', true)
                .data('x', event.clientX)
                .data('scrollLeft', this.scrollLeft)
                .addClass("dragging");

            return false;
        }).mouseup(function (event) {
            $(this)
                .data('down', false)
                .removeClass("dragging");
        }).mousemove(function (event) {
            if ($(this).data('down') == true) {
                this.scrollLeft = $(this).data('scrollLeft') + $(this).data('x') - event.clientX;
            }
        });
        $(window).mouseout(function (event) {
            if ($('.team-form-data').data('down')) {
                try {
                    if (event.originalTarget.nodeName == 'BODY' || event.originalTarget.nodeName == 'HTML') {
                        $('.team-form-data').data('down', false);
                    }
                } catch (e) {}
            }
        });
    }

    toggleFullScreen() {
        var doc = window.document;
        var docEl = doc.documentElement;
    
        var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
        var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
    
        if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
            requestFullScreen.call(docEl);
        } else {
            cancelFullScreen.call(doc);
        }
    }

    /*
        Formatar para moeda REAL
    */
    formatReal( int )
    {
        var tmp = this.clearString(int)+'';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

        return tmp;
    }

    /*
        Formatar para moeda REAL
    */
    formatCurrency( val )
    {
        var tmp = val.replace(".","");
        tmp = tmp.replace(",",".");
        //
        return parseFloat(tmp);
    }
}