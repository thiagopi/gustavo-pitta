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
use Session\Session;

class LoginMiddleware extends Middleware{

    public function __construct() {
        // print_r($this->csrfVerify());
        // $this->csrfVerify();
        
    }

    public static function handle(){
        // dd('dddd');
        // die(1);
        $s = Session::get('logged');
        // dd($s);
        if(!$s){
            redirect('admin/login');
            die();
        }
    }

    
}