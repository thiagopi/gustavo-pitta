<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-01
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PortfolioModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;
use Session\Session;
use App\Middleware\LoginMiddleware;

class AdminPortraitController extends Controller
{

    public static function viewAdminPortrait(){
        LoginMiddleware::handle();
        //
        $blade = new BladeOne();
        //
        $arr = PortfolioModel::getPictures(4);
        $idx = 0;
        foreach($arr as $a) {
            $arr[$idx]['s_text1'] = utf8_decode($a['s_text1']);
            $idx++;
        }
        //
        return $blade->run('admin.admin-portrait', compact('arr'));
    }
}