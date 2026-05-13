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

class WebServicesController extends Controller
{

    public static function postContact(){
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");

        $request = new Request();

        $allow = array('name', 'email', 'mobile', 'subject', 'message');
        
		// print_r("shit");
		// die();
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
        Log::info(implode( ", ", $response));
        // dd($request->input('name'));

        // if(env() === 'PROD'){
        //     $to = ['contato@gustavopitta.com.br'];
        // }else{
        //     $to = ['thiagopi@hotmail.com'];
        // }
        if($request->input('email') === "thiago@thiagopi.com.br"){
            if($response['result'] === 1){
                $mail = new Mail();
                $data = array();
                $data['name'] = $request->input('name');
                $data['email'] = $request->input('email');
                $data['mobile'] = $request->input('mobile');
                $data['subject'] = $request->input('subject');
                $data['message'] = $request->input('message');
                $enviar = $mail
                            ->subject('Contato via website')
                            ->to(['thiago@thiagopi.com.br'])
                            // ->bcc(['thiago@thiagopi.com.br', 'contatosite@gustavopitta.com.br'])
                            ->fromName('Gustavo Pitta')
                            ->view('email/contact-website', $data)
                            ->sendMail();
    
                Log::info($enviar);
                if($enviar){
                    $response[0] = array("result"=>1,"type"=>0, "msg"=>"Mensagem enviada com sucesso!");
                }else{
                    $response[0] = array("result"=>0,"type"=>1, "msg"=>"Não foi possível enviar a mensagem. Por favor tente novamente mais tarde.");
                }
                // print_r($enviar);
                // die();
            }
        }else{
            if($response['result'] === 1){
                $mail = new Mail();
                $data = array();
                $data['name'] = $request->input('name');
                $data['email'] = $request->input('email');
                $data['mobile'] = $request->input('mobile');
                $data['subject'] = $request->input('subject');
                $data['message'] = $request->input('message');
                $enviar = $mail
                            ->subject('Contato via website')
                            ->to(['contato@gustavopitta.com.br'])
                            ->bcc(['thiago@thiagopi.com.br', 'contatosite@gustavopitta.com.br'])
                            ->fromName('Gustavo Pitta')
                            ->view('email/contact-website', $data)
                            ->sendMail();
    
                Log::info($enviar);
                if($enviar){
                    $response[0] = array("result"=>1,"type"=>0, "msg"=>"Mensagem enviada com sucesso!");
                }else{
                    $response[0] = array("result"=>0,"type"=>1, "msg"=>"Não foi possível enviar a mensagem. Por favor tente novamente mais tarde.");
                }
                // print_r($enviar);
                // die();
            }
        }
        
        
        // $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>$response['msg']);
        // $response[0] = array("result"=>1,"type"=>0, "msg"=>($data['user_name']));
        return print_r(json_encode($response[0]));
        // return print_r($data);
    }
}