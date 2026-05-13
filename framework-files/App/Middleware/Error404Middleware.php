<?php
/**
 * Middleware
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-06-26
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Middleware;

use Closure;

class Error404Middleware extends Middleware{

    public function handle(){
        if(3 == 3){
            header("location: " . base_url() . "404");
        }else{
            return true;
        }
    }
}