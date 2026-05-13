<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-01
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\PortfolioModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;

class MakingOfController extends Controller
{

    public static function viewMakingOf(){

        
        $blade = new BladeOne();
        //
        // $arr = PortfolioModel::getPictures(1);
        $arr = PortfolioModel::loadMorePictures(1, 0);
        // dd($arr);
        //
        return $blade->run('making-of', compact('arr'));
    }
}