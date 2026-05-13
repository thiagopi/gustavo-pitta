<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-24
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use Routers\Router;
use Blade\BladeOne;

class PostController extends Controller
{
    public static function viewPost(){

        $blade = new BladeOne();
        // $b = $blade->run('post');

        return $blade->run('post');
        // return view('home');
        // return view('post');
    }

    public static function viewPost2(){

        $blade = new BladeOne();
        // $b = $blade->run('post');

        return $blade->run('post');
        // return view('home');
        // return view('post');
    }
}