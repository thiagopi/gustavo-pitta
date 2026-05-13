<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-24
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Models;

class BanksModel{
    
    private $banks = array();

    public static function getListBanks(){

        if( setDatabase('veebonus') ) {
        
        	$sql = "select id_bank, s_name, s_code from bank";
        	$result = PDOSelect($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }

}