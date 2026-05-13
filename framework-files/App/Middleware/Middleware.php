<?php

namespace App\Middleware;

// use ServerRequestInterface;
// use Closure;

class Middleware
{
    private $csrfVerify = true;

    /*
    *   Constructor
    */
    public function __construct() {
        // print_r($this->csrfVerify);
        // die();

        // if($this->csrfVerify){
        //     if(!csrfIsValid()){
        //         $msg = "Missing CSRF";
        //         // echo $msg;
        //         $response[0] = array("result"=>0,"type"=>1, "msg"=>$msg);
            
        //         $url = base_url() . "403/";
        //         // echo $url;
        //         // die();
        //         header("Location: $url"); 
        //         return print_r(json_encode($response[0]));
        //         die();
        //     }
        // }
        
    }

    public function csrfVerify(){
        if(!csrfIsValid()){
            $msg = "Missing CSRF";
            // echo $msg;
            $response[0] = array("result"=>0,"type"=>1, "msg"=>$msg);
        
            $url = base_url() . "403/";
            // echo $url;
            // die();
            // header("Location: $url"); 
            return print_r(json_encode($response[0]));
            // die();
        }else{
            $msg = "Go on!";
            $response[0] = array("result"=>0,"type"=>1, "msg"=>$msg);
            return print_r(json_encode($response[0]));
        }
    }
}