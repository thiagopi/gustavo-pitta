<?php
/**
 * Middleware
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-12-09
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Middleware;


use App\Middleware\Middleware;

class AuthorizedDomainMiddleware extends Middleware{

    public function __construct() {
        // print_r($this->csrfVerify());
        // $this->csrfVerify();
        
    }

    public function handle(){
        if($_SERVER['SERVER_NAME'] !== 'gustavopitta.com.br' && $_SERVER['SERVER_NAME'] !== '192.168.0.18' && $_SERVER['SERVER_NAME'] !== 'localhost'){
            return header('HTTP/1.1 401 Unauthorized', true, 401);
            die();
        }
    }

    
}