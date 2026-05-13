<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2020-01-16
 * @copyright   Copyright (c), 2019 THIAGOPI CORP.
 * @license     MIT public license
 */

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\PortfolioModel;
use Blade\BladeOne;
use Log\Log;
use Request\Request;

class PortfolioController extends Controller
{

    public static function postPortfolioLoadMore(){

        $response = array();
        $response[0] = array("result"=>0,"type"=>0, "msg"=>"");
        //
        $request = new Request();
        //
        $allow = array('cat', 'range');
        // dd($request->all());
        //
        $v = validate($allow, $request->all());
        $response = json_decode($v, true);
        Log::info(implode( ", ", $response));
        //
        $cat = $request->input('cat');
        $range = $request->input('range');
        //
        $loadMore = PortfolioModel::loadMorePictures($cat, $range);
        if($loadMore) {
            $idx = 0;
            foreach($loadMore as $a) {
                $loadMore[$idx]['s_text1'] = utf8_decode($a['s_text1']);
                $idx++;
            }
        }
        
        //
        $response[0] = array("result"=>1,"type"=>0, "msg"=>"Fotos carregadas com sucesso!", "obj"=>$loadMore);
        //
        return print_r(json_encode($response[0]));
    }
}