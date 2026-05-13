<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2020-02-22
 * @version     v1.1
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace Request;

class Request{
    private $method;
    private $data;

    public function __construct(){
        $this->setMethod(strtoupper($_SERVER['REQUEST_METHOD']));
        // $this->setData(getallheaders());
        // $this->setData($_POST);
        // print_r($_POST);
        // die();
        if($this->method == "GET") $this->setData($_GET);
        // if($this->method == "POST") $this->setData($_POST);
        if($this->method == "POST"){

            if(count($_POST) > 0){
                // dd($_FILES);
                // if(count($_FILES) > 0){
                    
                //     $_POST = array($_POST, $_FILES);
                //     $this->setData($_POST);
                //     // dd($arr);
                // }else{
                //     $this->setData($_POST);
                // }
                $this->setData($_POST);
                // $this->setData($_FILES);
            }else{
                $this->setData(json_decode(file_get_contents('php://input'), true));
            }
            
        }
        // if($this->method == "FILE") $this->setData($_GET);
        
        // return $this->getData();
    }

    public function all(){
        return $this->getData();
    }

    public function input($input){
        $data = $this->getData($input);
        if(isset($data[$input])){
            return $data[$input];
        }else{
            return "Wrong field name.";
        }

        return '';
    }

    /*
        GET FILE
    */
    public static function file($file){
        
        $uploadedFile = null;
        //
        if(isset($_FILES[$file])){
            $uploadedFile = $_FILES[$file];
        }else{
            $uploadedFile = false;
        }
        //
        return $uploadedFile;
    }

    /*
        Setters and Getters
    */
    private function setMethod($method){
        $this->method = $method;
    }
    public function getMethod(){
        return $this->method;
    }

    private function setData($data){
        $this->data = $data;
        // dd(gettype($this->data));
        // $arr = $this->data;
        // $this->data = array_push($arr, $data);
    }
    public function getData(){
        return $this->data;
    }
}