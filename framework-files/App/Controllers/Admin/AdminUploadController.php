<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2020-02-25
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\PortfolioModel;
// use App\Models\PortfolioModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;
use Mail\Mail;
use Security\Bcrypt;
use Session\Session;
use DateTime;
use App\Middleware\LoginMiddleware;

class AdminUploadController extends Controller
{

    public static function viewAdminUpload(){
        LoginMiddleware::handle();
        // $s = Session::get('logged');
        // // dd($s);
        // if(!$s){
        //     redirect('admin/login');
        //     die();
        // }
        //
        $blade = new BladeOne();
        //
        $arr = PortfolioModel::getPictures(6);
        //
        return $blade->run('admin.admin-upload', compact('arr'));
    }
    //
    public static function postUpload(){
        LoginMiddleware::handle();
        //
        $request = new Request();
        $allow = array('category');
        // dd($request->all());
        // dd($_POST);
        // dd($request->file('uploadFile'));
        $uploadFile = $request->file('uploadFile');
        if(!$uploadFile){
            $response[0] = array("result"=>0,"type"=>17, "msg"=>"Nenhum arquivo enviado.");
            return print_r(json_encode($response[0]));
        }
        // dd($uploadFile);
        // dd($_FILES["uploadFile"]);
        $allow = array('category', 'text_picture');
        //
        $v = validate($allow, $request->all());
        $response = json_decode($v, true);
        
        //
        if($response['result'] == 1){
           
            // dd($uploadFile["type"]);
            $category = $request->input('category');
            $text_picture = $request->input('text_picture');
            // dd($category);
            //
            $mimeType = array('image/jpeg');
            // Check file mime type
            // dd($uploadFile);
            if(!in_array($uploadFile["type"], $mimeType)){
                $response[0] = array("result"=>0,"type"=>17, "msg"=>"Formato de arquivo inválido.");
                return print_r(json_encode($response[0]));
            }
            //
            // dd($uploadFile['size']);
            // Check file size
            if ($uploadFile['size'] > 5000000) {
                $response[0] = array("result"=>0,"type"=>1, "msg"=>"Arquivo muito grande. Otimize o arquivo (máx: 5mb).");
                return print_r(json_encode($response[0]));
            }
            //
            $categoryDirectory = null;
            $filePrefixe = null;
            switch($category){
                case '1':
                    $categoryDirectory = 'gastronomia/';
                    $filePrefixe = 'gastronomy_';
                break;

                case '2':
                    $categoryDirectory = 'joias/';
                    $filePrefixe = 'jewels_';
                break;

                case '3':
                    $categoryDirectory = 'still/';
                    $filePrefixe = 'still_';
                break;

                case '4':
                    $categoryDirectory = 'retratos/';
                    $filePrefixe = 'portrait_';
                break;

                case '5':
                    $categoryDirectory = 'moda/';
                    $filePrefixe = 'fashion_';
                break;

                case '6':
                    $categoryDirectory = 'ambiente-e-decoracao/';
                    $filePrefixe = 'enviorment_';
                break;
            }
            $date = new DateTime();


            $data = array();
            
            // dd($idPicture);
            // dd(env());
            // dd($_SERVER['DOCUMENT_ROOT']);
            if(env() === "PROD"){
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/portfolio/' . $categoryDirectory;
            }else{
                $uploaddir = 'A:/localhost/gustavopitta/site2020/' . 'resources/images/portfolio/' . $categoryDirectory;
            }
            
            $_FILES['uploadFile']['name'] = $filePrefixe . $date->getTimestamp() . ".jpg";
            $uploadfile = $uploaddir . basename($_FILES['uploadFile']['name']);
            if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadfile)) {
                $data['id_category'] = $category;
                $data['s_file'] = $_FILES['uploadFile']['name'];
                $data['s_text1'] = $text_picture;
                $idPicture = PortfolioModel::insertPictures($data);
                //
                if($idPicture){
                    $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>"Seus dados foram enviados com sucesso!");
                }else{
                    $response[0] = array("result"=>0,"type"=>1, "msg"=>"Falha ao gravar no banco de dados!");
                }
                
            } else {
                $response[0] = array("result"=>0,"type"=>1, "msg"=>"Falhou!");
            }
            // valid extensions
            // $valid_extensions = array('jpg', 'jpeg');
            // // get uploaded file's extension
            // $ext = strtolower(pathinfo($uploadFile["name"], PATHINFO_EXTENSION));
            // dd($ext);
            // $fileType = $uploadFile["type"];
            // $fileName = $uploadFile["name"];
            //
            $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>"Seus dados foram enviados com sucesso!");
        }else{
            $response[0] = array("result"=>$response['result'],"type"=>$response['type'], "msg"=>$response['msg']);
        }

        return print_r(json_encode($response[0]));
    }
}