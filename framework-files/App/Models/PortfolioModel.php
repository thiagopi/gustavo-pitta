<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-24
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Models;

class PortfolioModel{
    
    private $banks = array();

    public static function getPictures($cat){

        if( setDatabase('gustavopitta') ) {
        
        	$sql = "SELECT 
            id_picture, s_file, s_text1 
            FROM picture
            WHERE id_category = $cat 
            AND fl_active = 1
            ORDER BY position ASC, id_picture DESC
            ";
        	$result = PDOSelect($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }
    //
    public static function loadMorePictures($cat, $offset){

        if( setDatabase('gustavopitta') ) {
        
        	$sql = "SELECT 
            id_picture, s_file, s_text1 
            FROM picture
            WHERE id_category = $cat 
            AND fl_active = 1
            ORDER BY position ASC, id_picture DESC
            LIMIT 10 OFFSET $offset
            ";
        	$result = PDOSelect($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }
    //
    public static function upadtePictures($values){
        if( setDatabase('gustavopitta') ) {
        
        	$sql = "INSERT INTO picture 
            (id_picture, s_text1, position)
            VALUES 
                $values
            ON DUPLICATE KEY UPDATE 
            s_text1 = VALUES(s_text1),
            position = VALUES(position);
            ";
        	$result = PDOExecute($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }
    //
    public static function insertPictures(array $data){
        if( setDatabase('gustavopitta') ) {
            $id_category = $data['id_category'];
            $s_file = $data['s_file'];
            $s_text1 = $data['s_text1'];
            //
        	$sql = "INSERT INTO picture 
            (
                id_category,
                s_file,
                s_text1
            )
            VALUES(
                $id_category,
                '$s_file',
                '$s_text1'
            )";
        	 $idReferral = PDOreturnID($sql);
             //
             if($idReferral){
                 return $idReferral;
             }else{
                 return false;
                 // $response[0] = array("result"=>0, "type"=>4, "msg"=>"Dados de login inválidos");
             }
             //
             return $idReferral;
        }else{
            return false;
        }
    }
    //
    public static function removePicture($id){
        if( setDatabase('gustavopitta') ) {
        
        	$sql = "UPDATE picture
            SET fl_active = 0
            WHERE id_picture = $id; 
            ";
        	$result = PDOExecute($sql);
        	//
        	return $result;
        }else{
            return false;
        }
    }
}