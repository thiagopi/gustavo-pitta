<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-05-31
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;


class Controller{

    function __construct(){
        
    }

    public static function view($name){
        return require_once('views/'.$name.'.php');
        // return "dfdfdf";
    }
}