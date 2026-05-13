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
use App\Models\UserModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;
use Security\Bcrypt;
use Session\Session;

class LoginController extends Controller
{

    public static function viewLogin(){
        $blade = new BladeOne();
        //
        $arr = PortfolioModel::getPictures(6);
        //
        return $blade->run('admin.login', compact('arr'));
    }
    //
    public static function postLogin(){
        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");
        //
        $request = new Request();
        $allow = array('username', 'password');
        //
        $v = validate($allow, $request->all());
        $response = json_decode($v, true);
        //
        if($response['result'] == 1){
            $username = $request->input('username');
            $password = $request->input('password');
            Session::put('logged', true);
            //
            $user = UserModel::getSingleUSer($username);
            if($user){
                // dd($user['s_password']);
                $hash = $user['s_password'];
                $validateLogin = Bcrypt::checkPassword($password, $hash);
                // $pw = Bcrypt::hashPassword('guramones');
                if($validateLogin){
                    $response[0] = array("result"=>1,"type"=>0, "msg"=>"Login efetuado com sucesso! ");
                }else{
                    $response[0] = array("result"=>0,"type"=>1, "msg"=>"Dados de login incorretos.");
                }
            }else{
                $response[0] = array("result"=>0,"type"=>1, "msg"=>"Dados de login incorretos.");
            }
            
            
            //
            // $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>"Seus dados foram enviados com sucesso!");
        }else{
            $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>$response['msg']);
        }

        return print_r(json_encode($response[0]));
    }

    public static function postLogout(){
        Session::forget('logged');
        $response = array();
        $response[0] = array("result"=>1,"type"=>0, "msg"=>"Deslogado com sucesso!");
        // redirect('admin/login');
        return print_r(json_encode($response[0]));
    }
}