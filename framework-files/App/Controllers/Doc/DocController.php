<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-25
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers\Doc;

use App\Controllers\Controller;
use Blade\BladeOne;

class DocController extends Controller
{

    public static function viewDocHome(){

        $blade = new BladeOne();
        $dd = 'null';
        //
        
        return $blade->run('doc.home');
    }

}