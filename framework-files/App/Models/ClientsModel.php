<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-24
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Models;

class ClientsModel{
    
    private $banks = array();

    public static function getClients(){

        if( setDatabase('gustavopitta') ) {
        
        	$sql = "SELECT 
            id_client, 
            s_file, 
            s_text1, 
            s_text2 
            FROM client
            ORDER BY s_text1 ASC
            ";
        	$result = PDOSelect($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }

}