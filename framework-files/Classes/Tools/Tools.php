<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-07-30
 * @version     1.4.1
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace Tools;

use \DateTime;

class Tools{

    /*
        Text Capitalize
    */
    public static function capitalize($text){
        // $lc = mb_strtolower($text, 'UTF-8');
        // $normalized = ucwords(mb_strtolower($text, 'UTF-8'));
        $normalized = mb_convert_case(mb_strtolower($text), MB_CASE_TITLE, "UTF-8");
        // $normalized = ucwords($text);
        $normalized = str_replace(" A ", " a ", $normalized);
        $normalized = str_replace(" E ", " e ", $normalized);
        $normalized = str_replace(" I ", " i ", $normalized);
        $normalized = str_replace(" O ", " o ", $normalized);
        $normalized = str_replace(" U ", " u ", $normalized);
        //
        $normalized = str_replace(" As ", " as ", $normalized);
        $normalized = str_replace(" Os ", " os ", $normalized);
        //
        // $normalized = str_replace("Á", "á", $normalized);
        // $normalized = str_replace("É", "é", $normalized);
        // $normalized = str_replace("Í", "í", $normalized);
        // $normalized = str_replace("Ó", "ó", $normalized);
        // $normalized = str_replace("Ú", "ú", $normalized);
        // $normalized = str_replace("À", "à", $normalized);
        $normalized = str_replace(" Á ", " á ", $normalized);
        $normalized = str_replace(" É ", " é ", $normalized);
        $normalized = str_replace(" À ", " à ", $normalized);
        //
        $normalized = str_replace(" Da ", " da ", $normalized);
        $normalized = str_replace(" Das ", " das ", $normalized);
        $normalized = str_replace(" De ", " de ", $normalized);
        $normalized = str_replace(" Di ", " di ", $normalized);
        $normalized = str_replace(" Do ", " do ", $normalized);
        $normalized = str_replace(" Dos ", " dos ", $normalized);
        $normalized = str_replace(" Du ", " du ", $normalized);
        //
        $normalized = str_replace(" Na ", " na ", $normalized);
        $normalized = str_replace(" Nas ", " nas ", $normalized);
        $normalized = str_replace(" Ne ", " ne ", $normalized);
        $normalized = str_replace(" Ni ", " ni ", $normalized);
        $normalized = str_replace(" No ", " no ", $normalized);
        $normalized = str_replace(" Nos ", " nos ", $normalized);
        $normalized = str_replace(" Nu ", " nu ", $normalized);
        //
        $normalized = str_replace(" Em ", " em ", $normalized);
        $normalized = str_replace(" Que ", " que ", $normalized);
        $normalized = str_replace(" Ao ", " ao ", $normalized);
        //
        $normalized = str_replace(" São ", " são ", $normalized);
        //
        $normalized = str_replace("R. ", "Rua ", $normalized);
        $normalized = str_replace("R ", "Rua ", $normalized);
        $normalized = str_replace("Avenida ", "Av. ", $normalized);
        $normalized = str_replace("Av ", "Av. ", $normalized);
        $normalized = str_replace("Alameda ", "Al. ", $normalized);
        $normalized = str_replace("Al ", "Al. ", $normalized);
        //
        return $normalized;
    }

        
    /*
        Text normalize
    */
    public static function normalize($string) {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );
    
        return strtr($string, $table);
    }

    /*
        Text LOWERCASE
    */
    public static function lowercase($text){
        // $lc = mb_strtolower($text, 'UTF-8');
        $normalized = mb_strtolower($text, 'UTF-8');
        //
        return $normalized;
    }
    /*
        Text UPPERCASE
    */
    public static function uppercase($text){
        // $lc = mb_strtolower($text, 'UTF-8');
        $toUppercase = mb_convert_case($text, MB_CASE_UPPER, 'UTF-8');
        //
        return $toUppercase;
    }

    /*
        Limpar string
    */
    public static function clearString($str){
        $clearStr = $str;
        $clearStr = trim($str);
        $clearStr = str_replace(".", "", $clearStr);
        $clearStr = str_replace(" ", "", $clearStr);
        $clearStr = str_replace("/", "", $clearStr);
        $clearStr = str_replace("-", "", $clearStr);
        //
        return $clearStr;
    }

    /*
        Gerar senha para revendas e vendedores
    */
    public static function pwGenerate($qtd = 10){
        // define('__ALPHAUPPER__' , ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"], true);
        $alphaUpper = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $alphaLower = array_map('strtolower', $alphaUpper);
        // define('__SYMBOLS__', ["@", "%", "&", "*"]);
        // define('__NUMBERS__', ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]);
        $numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        //
        $strArray = array();
        $strArray = array_merge($strArray, $alphaUpper);
        $strArray = array_merge($strArray, $alphaLower);
        // $strArray = array_merge($strArray, __SYMBOLS__);
        $strArray = array_merge($strArray, $numbers);
        //
        $pw = '';
        //
        for($i = 0; $i < $qtd; $i++){
            $pw = $pw . $strArray[array_rand($strArray)];
        }
        return $pw;
    }

    
    /*
        Gerar uma sequência de números aleatórios
    */
    public static function numberGenerate($qtd = 11){
        
        $numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        //
        $strArray = array();
        $strArray = array_merge($strArray, $numbers);
        //
        $pw = '';
        //
        for($i = 0; $i < $qtd; $i++){
            $pw = $pw . $strArray[array_rand($strArray)];
        }
        return $pw;
    }

    /*
        Mascarar Strings, no caso só tem de CNPJ (depriciated -> usar setMask)
    */
    public static function masks($tipo, $str){
        $clearStr = trim($str);
        $clearStr = str_replace(".", "", $clearStr);
        $clearStr = str_replace("/", "", $clearStr);
        $clearStr = str_replace("-", "", $clearStr);
        //
        if($tipo == 'cnpj'){
            $mask = '##.###.###/####-##';
            $maskared = '';
            $k = 0;
            for($i = 0; $i<=strlen($mask)-1; $i++)
            {
                if($mask[$i] == '#')
                {
                    if(isset($clearStr[$k]))
                    $maskared .= $clearStr[$k++];
                }
                else
                {
                    if(isset($mask[$i]))
                    $maskared .= $mask[$i];
                }
            }
            return $maskared;
        }
        elseif($tipo == 'cpf'){
            $mask = '###.###.###-##';
            $maskared = '';
            $k = 0;
            for($i = 0; $i<=strlen($mask)-1; $i++)
            {
                if($mask[$i] == '#')
                {
                    if(isset($clearStr[$k]))
                    $maskared .= $clearStr[$k++];
                }
                else
                {
                    if(isset($mask[$i]))
                    $maskared .= $mask[$i];
                }
            }
            return $maskared;
        }
        elseif($tipo == 'cep'){
            $mask = '#####-###';
            $maskared = '';
            $k = 0;
            for($i = 0; $i<=strlen($mask)-1; $i++)
            {
                if($mask[$i] == '#')
                {
                    if(isset($clearStr[$k]))
                    $maskared .= $clearStr[$k++];
                }
                else
                {
                    if(isset($mask[$i]))
                    $maskared .= $mask[$i];
                }
            }
            return $maskared;
        }
    }

    /*
        Set mask to string
    */
    public static function setMask($type, $str){
        $clearStr = trim($str);
        $clearStr = str_replace(".", "", $clearStr);
        $clearStr = str_replace("/", "", $clearStr);
        $clearStr = str_replace("-", "", $clearStr);
        //
        switch($type){
            case 'cnpj':
                $mask = '##.###.###/####-##';
                $maskared = '';
                $k = 0;
                for($i = 0; $i<=strlen($mask)-1; $i++){
                    if($mask[$i] == '#')
                    {
                        if(isset($clearStr[$k]))
                        $maskared .= $clearStr[$k++];
                    }
                    else
                    {
                        if(isset($mask[$i]))
                        $maskared .= $mask[$i];
                    }
                }
                break;

            case 'cpf':
                $mask = '###.###.###-##';
                $maskared = '';
                $k = 0;
                for($i = 0; $i<=strlen($mask)-1; $i++){
                    if($mask[$i] == '#')
                    {
                        if(isset($clearStr[$k]))
                        $maskared .= $clearStr[$k++];
                    }
                    else
                    {
                        if(isset($mask[$i]))
                        $maskared .= $mask[$i];
                    }
                }
                break;

            case 'cep':
                $mask = '#####-###';
                $maskared = '';
                $k = 0;
                for($i = 0; $i<=strlen($mask)-1; $i++)
                {
                    if($mask[$i] == '#')
                    {
                        if(isset($clearStr[$k]))
                        $maskared .= $clearStr[$k++];
                    }
                    else
                    {
                        if(isset($mask[$i]))
                        $maskared .= $mask[$i];
                    }
                }
                break;
        }
        //
        return $maskared;
    }

    /*
        Date Format BR, US
    */
    public static function dateFormat($str, $type = 'br'){

        $str = str_replace('/', '-', $str);
        switch($type){
            case null:
            case 'br':
                $newDate = date("d/m/Y", strtotime($str));
                break;
            case 'br-withTimestamp':
                $newDate = date("d/m/Y H:i:s", strtotime($str));
                break;
    
            case 'en':
                // $newDate = date("Y/m/d", strtotime($str));
                $newDate = date("Y/m/d", strtotime($str));
                break;
    
            default:
                $newDate = date("d/m/Y", strtotime($str));
                break;
                
        }
        return $newDate;
    }

    /*
        Parse Decimal format
    */
    public static function parseToDecimal($ammount){
        $value = str_replace('.', '', $ammount);
        $value = str_replace(',', '', $value);
        $value = substr_replace( $value, '.', -2, 0 ); 
        $value = floatval($value);
        //
        return $value;
    }

    /*
        Conversão do Timestamp (depriciated -> usar dataFormat)
    */
    public static function onlyDate($date, $lang = 'br'){
        $d = $date;
        $d = explode(" ", $d);
        //
        return Tools::dateFormat($d[0], $lang);
    }

    /*
        Difference between today and some date
    */
    public static function dateDifference($dateBankSlip){
        $theDate = str_replace('/', '-', $dateBankSlip);
        $date = new DateTime($theDate);
        $today = new DateTime(date("Y-m-d"));
        //
        $interval = $date->diff($today);
        $d = $interval->format('%R%a');
        //
        return $d;
    }

    /*
        Only numbers in string
    */
    public static function onlyNumbers($str){
        // \D means "anything that isn't a digit
        $newString = preg_replace('/\D/', '', $str);
        return $newString;
    }

    /*
        Redirect to specific route
    */
    public static function redirect($destiny){
        header("location: " . base_url() . $destiny);
    }

    /*
        parse float to currency Real Brasil
    */
    public static function parseCurrencyReal($number){
        $n = number_format($number, 2, ",", ".");
        return $n;
    }

    /*
        Check id currency is Real Brasil
    */
    public static function isCurrencyReal($ammount) {
        $ammount = (string) $ammount;
        $regra = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";
        if(preg_match($regra, $ammount)) {
            return true;
        } else {
            return false;
        }
    }
}