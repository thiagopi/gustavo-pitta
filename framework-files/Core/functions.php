<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @modified    2019-12-09
 * @version     1.2
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */


function env(){
    return getConfig("environment");
}

function view($name, $parameters = null){
    if($parameters){
        foreach($parameters as $key=>$value){
            ${"$key"} = $value;
        }
    }
    $view = require_once('framework-files/views/'.$name.'.view.php');
    return $view;
}


function view2($name, $parameters = null){
    if($parameters){
        foreach($parameters as $key=>$value){
            ${"$key"} = $value;
        }
    }
    $view = file_get_contents('framework-files/views/'.$name.'.view.php');
    $skuList = explode(' ', $view);
    foreach($skuList as $l){
        echo get_string_between($l, "@", ")");
        // echo $l;
    }

    // foreach(preg_split('~[\r\n]+~', $view) as $line){
    //     if(empty($line) or ctype_space($line)) continue; // skip only spaces
    //     // if(!strlen($line = trim($line))) continue; // or trim by force and skip empty
    //     // $line is trimmed and nice here so use it
    // }
    die();
    return $view;
}

/*
    Get specific string between other two strings
*/
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function viewEmail($name, $parameters = null){
    if($parameters){
        foreach($parameters as $key=>$value){
            ${"$key"} = $value;
        }
    }
    ob_start();
    $view = require_once('framework-files/views/'.$name.'.view.php');
    return ob_get_clean();
}

function assets($path){
    // server protocol
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    // diretory name
    // $dirname = dirname($_SERVER["REQUEST_URI"].'?');
    // echo $dirname;
    // die();
    // domain name
    $urlBase = str_replace("http", $protocol, APP_URL);
    // $domain = $_SERVER['SERVER_NAME'];
    return $urlBase.'resources/'.$path;
}

function storage_path(){
    // server protocol
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    $urlBase = str_replace("http", $protocol, APP_URL);
    return $urlBase.'framework-files/storage/';
}

function vendor($path){
    // server protocol
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    // diretory name
    // $dirname = dirname($_SERVER["REQUEST_URI"].'?');
    // domain name
    // $domain = $_SERVER['SERVER_NAME'];
    $urlBase = str_replace("http", $protocol, APP_URL);
    return $urlBase.'framework-files/vendor/'.$path;
}

function base_url(){
    // server protocol
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    // diretory name
    // $dirname = dirname($_SERVER["REQUEST_URI"].'?');
    // domain name
    // $domain = $_SERVER['SERVER_NAME'];
    $urlBase = str_replace("http", $protocol, APP_URL);
    return $urlBase;
}

function getCurrentPage(){
    $currentPage = str_replace(".php","",basename($_SERVER['PHP_SELF']));
    $page = str_replace("_"," ", $currentPage);
    $requestURI = basename($_SERVER['REQUEST_URI']);
    return $requestURI;
}


function ipClient(){

    // if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //     if (preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", $_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //         return $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     }
    // }
    // return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function dd($obj)
{
    var_dump($obj);
    die();
}

/**
 * Regenerates the csrf token and stores in the session.
 * It requires an open session.
 */
function regenerateToken() {
    // $csrf_token = null;
    try {
        $csrf_token = bin2hex(random_bytes(10));
    } catch (Exception $e) {
        $csrf_token = "123456789012345678901234567890"; // unable to generates a random token.
    }
    @$_SESSION["_token"] = $csrf_token . "|" . ipClient();

    return @$_SESSION["_token"];
}

/**
 * Returns the current token. if there is not a token then it generates a new one.
 * It could require an open session.
 * @param bool $fullToken  It returns a token with the current ip.
 * @return string
 */
function csrf_token($fullToken=false) {
    $csrf_token = @$_SESSION["_token"];

    if ($csrf_token == "" || $csrf_token == null) {
        $csrf_token = regenerateToken();
        // dd($csrf_token);
    }
    if ($fullToken) {
        return $csrf_token . "|" . ipClient();
    }
    return $csrf_token;
}

/**
 * Validates if the csrf token is valid or not.
 * It could require an open session.
 * @return bool
 */
function csrfIsValid() {
    if($GLOBALS['CSRF']){
        $csrf_token = @$_SESSION["_token"];

        if (@$_SERVER['REQUEST_METHOD'] == 'POST') {
            $headers = apache_request_headers();

            if(isset($_POST['_token'])){
                $csrf_token = @$_POST['_token'];

            }elseif(isset($headers['X-CSRF-TOKEN'])){
                $csrf_token = $headers['X-CSRF-TOKEN'];

            }else{

                //"Missing CSRF";
                return false;
            }

            if($csrf_token == @$_SESSION["_token"]){
                return true;
            }else{
                return false;
            }
            // return $csrf_token . "|" . ipClient() == @$_SESSION["_token"];
        } else {
            if ($csrf_token == "" || !$csrf_token) {
                // if not token then we generate a new one
                regenerateToken();
            }
            return true;
        }
    }else{
        return true;
    }

}


/**
 * Validate post on body
 * Function to verify the required fields
 * @param $requiredData
 * @param $requestData
 * @return json
 */
function validate(array $requiredData, array $requestData){
    // dd($requestData);
    $response = array();
    $response[0] = array("result"=>0,"type"=>0, "msg"=>"");

    $array1 = array();
    $array2 = array();
    //
    if(isAssoc($requiredData)){
        foreach($requiredData as $key=>$value){
            array_push($array1, $key);
        }
    }else{
        $array1 = $requiredData;
    }
    //
    if(isAssoc($requestData)){
        foreach($requestData as $key=>$value){
            array_push($array2, $key);
        }
    }else{
        $array2 = $requestData;
    }

    /*
        Verify all required fields
    */
    $fieldsRequired = array_diff($array1, $array2);
    $total = count($fieldsRequired);
    if($total > 0){
        $fields = '';

        $idx = 1;
        foreach($fieldsRequired as $key){

            if($idx != $total){
                $fields .= $key . ", ";
            }else{
                $fields .= $key;
            }
            $idx++;
        }

        $msg = "Missed fields: " . $fields;
        $response[0] = array("result"=>0,"type"=>3, "msg"=>$msg);
        return json_encode($response[0]);
    }

    /*
        Verify fileds not allowed
    */
    $fieldsNotAllowed = array_diff($array2, $array1);
    // dd($fieldsNotAllowed);
    $total = count($fieldsNotAllowed);
    if($total > 0){
        $fields = '';

        $idx = 1;
        foreach($fieldsNotAllowed as $key){

            if($idx != $total){
                $fields .= $key . ", ";
            }else{
                $fields .= $key;
            }
            $idx++;
        }

        $msg = "Fields not allowed: " . $fields;
        $response[0] = array("result"=>0,"type"=>2, "msg"=>$msg);
        return header('HTTP/1.1 401 Unauthorized', true, 401);
        // return json_encode($response[0]);
    }

    $response[0] = array("result"=>1,"type"=>0, "msg"=>"Everything is fine!");
    return json_encode($response[0]);
}


function isAssoc(array $arr)
{
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}


/*
    Check browser name and version
*/
function getBrowserInfo(){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";
    $ub = null;
    //
    // print_r($u_agent);
    // die();
    // First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    //
    $u_agent = explode(" ", $u_agent);
    $u_agent = end($u_agent);
    // echo $u_agent;
    // die();

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif(preg_match('/Firefox/i',$u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif(preg_match('/Chrome/i',$u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif(preg_match('/Safari/i',$u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif(preg_match('/OPR/i',$u_agent)) {
        $bname = 'Opera';
        $ub = "OPR";
    } elseif(preg_match('/Netscape/i',$u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    } elseif(preg_match('/Edge/i',$u_agent)) {
        $bname = 'Microsoft Edge';
        $ub = "Edge";
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            if(isset($matches['version'][0])){
                $version = $matches['version'][0];
            }
        } else {
            if(isset($matches['version'][1])){
                $version = $matches['version'][1];
            }
        }
    } else {
        if(isset($matches['version'][0])){
            $version = $matches['version'][0];
        }
    }
    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    //
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

/*
    SVG Support
*/
function checkSupportSVG(){
    $browser = getBrowserInfo();
    $name = $browser['name'];
    $version = intval($browser['version']);
    //
    if($name == "Mozilla Firefox" && $version < 3){
        return false;
    }elseif($name == "Google Chrome" && $version < 4){
        return false;
    }else{
        return true;
    }
}

/*
    REDIRECT
*/
function redirect($destiny){
    header("location: " . base_url() . $destiny);
}

/*
    parse float to currency Real Brasil
*/
function parseCurrencyReal($number){
    $n = number_format($number, 2, ",", ".");
    return $n;
}
/*
    Verificar o formato da moeda real
*/
function isCurrencyReal($ammount) {
    $ammount = (string) $ammount;
    $regra = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";
    if(preg_match($regra, $ammount)) {
        return true;
    } else {
        return false;
    }
}


/*
    Check Domain
*/
// function checkDomain(array $domain){
//     foreach($domain as $value){

//     }
// }
