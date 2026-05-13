<?php
/**
 * Log - write log file
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-19
 * @version     1.1
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace Log;

class Log{

    /**
     * Log constructor
     */
    public function __construct(){

    }

    static public function info( string $contents ){
        self::run('INFO', $contents);
    }

    static public function warning( string $contents ){
        self::run('WARNING', $contents);
    }

    static public function debug( string $contents ){
        self::run('DEBUG', $contents);
    }

    static public function error( string $contents ){
        self::run('ERROR', $contents);
    }


    /**
     * @param string $type
     * @param string $contents
     */
    static private function run(string $type, string $contents){

        try {

            if( strLen(LOG_FILE) > 0  )   
                $storage_file = LOG_FILE;
            else
                $storage_file = dirname(dirname(dirname(__FILE__))).DS."storage".DS."logs";

            $storage_file = $storage_file . DS . date("Y-m-d") . ".log";

            $new_content = self::generateLineHead(file_exists($storage_file), $type);
            $new_content .= $contents;
            
            file_put_contents($storage_file, $new_content . PHP_EOL, FILE_APPEND) or self::throw_error("Cannot open file: " . $storage_file);
   
        } catch(Exception $e){

            self::error($e);
        }
        
    }

    static private function throw_error($error){
        if( ENVIRONMENT != "PRODUCTION" )
            die( $error );
        else
            die( );
    }


    /**
        generate line header

        format: date/time;request ip;


     * @param bool $append
     * @param string $type
     * @return string
     */
    static private function generateLineHead(bool $append, string $type){

        $t = microtime(true);
        $micro = sprintf("%03d", ($t - floor($t)) * 1000);
        $datetime = date('Y-m-d H:i:s.'.$micro, $t);

        //try to get IP from some variables        
        $ip = isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $ip = isset( $_SERVER['X_FORWARDED_FOR'] ) ? $_SERVER['X_FORWARDED_FOR'] : $ip;

        //construct log line head
        $head = $datetime . " | ". $ip . " | ".$type." | ";

        return $head;
    }
}

//load log config
define('LOG_FILE', getConfig("log_path") );



