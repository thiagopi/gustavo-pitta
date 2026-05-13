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
use App\Middleware\LoginMiddleware;

class AdminPortfolioController extends Controller
{
    public static function postAdminPortfolio(){
        LoginMiddleware::handle();
        //
        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");
        //
        $request = new Request();
        $portfolio = $request->all();

        
        $values = '';
        foreach($portfolio as $key=>$value){
            $values .= '('.$value['id_picture'].',"'.($value['s_text1']).'",'.$value['position'].'),';
        }
        $values = substr($values, 0, -1);
        // dd($values);

        $update = PortfolioModel::upadtePictures($values);
        
        if($update){
            $response[0] = array("result"=>1,"type"=>0, "msg"=>"Dados atualizados com sucesso!");
        }else{
            $response[0] = array("result"=>0,"type"=>1, "msg"=>$update);
        }

        return print_r(json_encode($response[0]));
    }
    //
    public static function postRemovePicture(){
        LoginMiddleware::handle();
        //
        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");
        //
        $request = new Request();

        $id = $request->input('id');

        $update = PortfolioModel::removePicture($id);
        //
        if($update){
            $response[0] = array("result"=>1,"type"=>0, "msg"=>"Foto removida com sucesso!");
        }else{
            $response[0] = array("result"=>0,"type"=>1, "msg"=>$update);
        }
        //
        return print_r(json_encode($response[0]));
    }
}