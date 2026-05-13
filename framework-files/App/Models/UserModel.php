<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-24
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Models;

class UserModel{
    

    public static function getSingleUSer($username){

        if( setDatabase('gustavopitta') ) {
        
        	$sql = "SELECT 
            id_user, 
            s_username, 
            s_email, 
            s_password 
            FROM user
            WHERE s_username = '$username'
            LIMIT 1
            ";
        	$result = PDOSelect($sql);
        	//
        	return $result[0];
        }else{
            return false;
        }
    }

}