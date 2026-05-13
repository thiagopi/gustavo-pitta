<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-01
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\BanksModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;

class HomeController extends Controller
{

    public static function viewHome(){

        // return view('home');
        $test = "testando envio de variável para a view";
        $test2 = "bbbbbbb";
        $arr = array();
        $banks = new BanksModel();
        // dd($banks);
        $arr = $banks->getListBanks();
        $version  = "v" . getConfig("app_version");
        //
        // dd(\Tools\Tools::dateDifference('20/05/2019'));
        // dd(\Tools\Tools::setMask('cnpj', '58986100000119'));
        // $t = microtime(true);
        // $micro = sprintf("%03d", ($t - floor($t)) * 1000);
        // $datetime = date('Y-m-d H:i:s.'.$micro, $t);
        // dd(date('Y-m-d H:i:s'));
        // $test = implode("; ", $arr[0]);
        // Log::info($test);
        // $t = substr($arr[0]['s_name'], 6);
        // dd($t);
        $blade = new BladeOne();
        //
        // $browser = getBrowserInfo();
        // foreach ($browser as $name => $value) {
        //     echo "<b>$name</b> $value <br />\n";
        // }
        // echo checkSupportSVG();
        // var_dump((getBrowserInfo()));
        // $mail = new Mail();
        // $data = array();
        // $data['name'] = "Thiago Pereira";
        // $data['email'] = "thiago.pereira@vee.digital";
        // $data['phoneNumber'] = "(11) 98745-5935";
        // $data['document'] = "30894868810";
        // $data['birthDate'] = "30-01-1981";
        // $data['username'] = "thiagopi";
        // $data['pw'] = "erer4r4t45454rfed";
        // $enviar = $mail
        //             ->subject('Contato via website')
        //             ->to(['thiagopi@hotmail.com'])
        //             // ->bcc(['thiagopi@yahoo.com.br', 'thiagopi@hotmail.com'])
        //             ->fromName('Gustavo Pitta')
        //             // ->body("sdsf dsfds fds fds fdsf dfd fd d")
        //             // ->view('email/employee-refund', $data)
        //             ->view('email/contact-website')
        //             ->sendMail();
        // print_r($enviar);
        // die();
        // //
        return $blade->run('home');
        // return view2('home', compact('test', 'test2', 'arr', 'version'));
    }

    public static function post(){
        // header('Content-Type: application/json');
        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");

        $request = new Request();

        $allow = array('user_name', 'user_email');
        

        // print_r($request->all());
        // die();
        // if(count($request->all()) > 0){
        //     $v = validate($allow, $request->all());
        //     $response = json_decode($v, true);
        // }else{
        //     $fields = json_decode(file_get_contents('php://input'), true);
        //     $v = validate($allow, $fields);
        //     $response = json_decode($v, true);
        // }
        // dd($request->all());
        $v = validate($allow, $request->all());
        $response = json_decode($v, true);
        // $v = validate($allow, $request->all());
        // print_r($response);
        // die();
        // dd($v);
        
        // if($v['result'] < 1){
        //     echo 'falhou';
        // }else{
        //     echo 'foi!';
        // }
        // die();
        // $data =  json_decode(file_get_contents('php://input'), true);
        // $data = file_get_contents('php://input');
        // $data =  json_decode(file_get_contents('php://input'), true);
        // $data = json_encode($data);
        // Log::info((implode(",", $request->all())));
        // die($data);
        $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>$response['msg']);
        // $response[0] = array("result"=>1,"type"=>0, "msg"=>($data['user_name']));
        return print_r(json_encode($response[0]));
        // return print_r($data);
    }
}