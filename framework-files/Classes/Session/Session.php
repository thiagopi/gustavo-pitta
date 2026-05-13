<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-06-04
 * @version      1.0
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace Session;

class Session{
    
    public function __construct(){

    }

    public static function put(string $name, $value){
        $_SESSION[$name] = $value;
    }

    public static function get(string $name){
        return $_SESSION[$name];
    }

    public static function forget(string $name){
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
    }

    public static function all(){
        // foreach ($_SESSION as $key=>$val)
        //     print_r($key." => ".$val."<br/>");
        return var_dump($_SESSION);
    }

    // removendo todas as sessões
    public static function flush(){
        foreach ($_SESSION as $key=>$val){
            $_SESSION[$key] = null;
            unset($_SESSION[$key]);
            // print_r($key." => ".$val."<br/>");
        }
        session_destroy();
        // unset( $_SESSION );
    }
}