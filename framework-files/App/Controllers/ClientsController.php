<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-01
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\ClientsModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;

class ClientsController extends Controller
{

    public static function viewClients(){

        
        $blade = new BladeOne();
        //
        $arr = ClientsModel::getClients();
        $idx = 0;
        foreach($arr as $a) {
            $arr[$idx]['s_text1'] = utf8_decode($a['s_text1']);
            $arr[$idx]['s_text2'] = utf8_decode($a['s_text2']);
            $idx++;
        }
        //
        return $blade->run('clients', compact('arr'));
    }
}