<?php
/**
 * Middleware
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-06-26
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Middleware;


use App\Middleware\Middleware;

class ForbiddenMiddleware extends Middleware{

    public function __construct() {
        // print_r($this->csrfVerify());
        // $this->csrfVerify();
        
    }

    public function handle(){
        // dd("ddddd");
        // if(3 == 3){
        //     header("location: " . base_url() . "403");
        // }else{
        //     return true;
        // }
    }

    
}