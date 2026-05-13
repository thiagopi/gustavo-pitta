<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-06-19
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use Blade\BladeOne;
use Log\Log;
use Request\Request;

class SystemController extends Controller
{
    public static function view403(){

        // return view('home');
        redirect('');
        // $blade = new BladeOne();
        // return $blade->run('403');
    }

    //
    public static function view404(){

        // return view('home');
        redirect('');
        
        // $blade = new BladeOne();
        // return $blade->run('404');
    }
}