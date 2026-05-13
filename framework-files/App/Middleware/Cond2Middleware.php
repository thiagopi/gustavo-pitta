<?php
/**
 * Middleware
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-18
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Middleware;


use App\Middleware\Middleware;

class Cond2Middleware extends Middleware{

    public function handle(){
        echo "go ahead 2!<br>";
        // dd("ddddd");
        // if(3 == 3){
        //     header("location: " . base_url() . "403");
        // }else{
        //     return true;
        // }
    }

    
}